<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nelayan;
use App\DataTangkapan;
use Validator;
use Auth;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataExport;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function tambahNelayanPage(){
        return view('tambah_nelayan');
    }

    public function tambahDataPage(){
        $nelayans = Nelayan::all();
        return view('tambah_data',compact('nelayans'));
    }

    public function listDataPage(){
        $datas              = DataTangkapan::orderBy('id','DESC')->get();
        $totalNelayan       = DataTangkapan::distinct('nelayan')->count('nelayan');
        $totalData          = DataTangkapan::count();
        $jumlahTangkapan    = DataTangkapan::sum('jumlah');
        $dataNelayanTerbaik = DataTangkapan::select('nelayan',DB::raw('sum(jumlah)'))->groupBy('nelayan')->get();
        $sumJumlah          = $dataNelayanTerbaik->max('sum(jumlah)');
        $nelayanTerbaik     = $dataNelayanTerbaik->where('sum(jumlah)',$sumJumlah)->first()['nelayan'];
        if($nelayanTerbaik == NULL) $nelayanTerbaik = "-";
        $year = Carbon::now()->format('Y');
        $jumlahperbulan = DataTangkapan::select('tanggal', DB::raw('sum(jumlah) as jumlah'))->whereYear('tanggal',$year)->groupBy('tanggal')->get();
        return view('list_data',compact('year','jumlahperbulan','datas','totalNelayan','totalData','jumlahTangkapan','nelayanTerbaik'));
    }

    public function storeNelayan(Request $request){
        $nelayan = new Nelayan ([
            'name' => $request->name,
            'umur' => $request->umur,
            'jenis' => $request->jenis,
        ]);
        $nelayan->save();
        return redirect(route('tambahNelayanPage'))->with(['success' => 'Nelayan berhasil ditambahkan!']);
    }
    public function storeData(Request $request)
    {
        $request->validate([
            'nelayan' => 'required',
            'alatTangkap'=> 'required',
            'jenisKapal'=> 'required',
            'tempatpendaratanikan'=> 'required',
            'dpi' => 'required',
            'tambahIkan.*.jenis' => 'required',
            'tambahIkan.*.jumlah' => 'required',
        ]);

        foreach ($request->tambahIkan as $key => $value) {
            $value['nelayan']=$request->nelayan;
            $value['alattangkap']=$request->alatTangkap;
            $value['jeniskapal']=$request->jenisKapal;
            $value['dpi']=$request->dpi;
            $value['tempatpendaratanikan']=$request->tempatpendaratanikan;
            $value['tanggal'] = Carbon::now()->format('Y-m-d');
            DataTangkapan::create($value);
        }
        
        return back()->with('success', 'Record Created Successfully.');
    }

    public function export_excel()
	{
		return Excel::download(new DataExport, 'Data Tangkapan.xlsx');
	}
}
