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

    public function dashboardPage(){
        $totalNelayan       = DataTangkapan::distinct('nelayan')->count('nelayan');
        $bobotTangkapan     = DataTangkapan::sum('bobotTCT');
        // $jumlahTangkapan    = DataTangkapan::sum('jumlah');
        $hargaTertinggi     = DataTangkapan::max('hargaTCT'); //variabel jumlah adalah harga, belum dirubah karena permintaan perubahan sudah dalam proses pemakaian
        if($hargaTertinggi == NULL) $hargaTertinggi = "0";
        $dataNelayanTerbaik = DataTangkapan::select('nelayan',DB::raw('sum(hargaTCT)'))->groupBy('nelayan')->get();
        $sumBobot           = $dataNelayanTerbaik->max('sum(bobotTCT)');
        $nelayanTerbaik     = $dataNelayanTerbaik->where('sum(bobotTCT)',$sumBobot)->first()['nelayan'];
        if($nelayanTerbaik == NULL) $nelayanTerbaik = "-";
        $year = Carbon::now()->format('Y');
        $bobotperbulan = DataTangkapan::select('tanggal', DB::raw('sum(bobotTCT) as bobot'))->whereYear('tanggal',$year)->groupBy('tanggal')->get();
        // dd($bobotperbulan);
        return view('dashboard',compact('year','bobotperbulan','totalNelayan','bobotTangkapan','hargaTertinggi','nelayanTerbaik'));
    }

    public function tambahDataPage(){
        $nelayans = Nelayan::all();
        return view('tambah_data',compact('nelayans'));
    }

    public function listDataPage(){
        $datas = DataTangkapan::orderBy('id','DESC')->get();
        
        return view('list_data',compact('datas'));
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
            'namaKapal'=> 'required',
            'noKapal'=> 'required',
            'jumlahABK'=> 'required',
            'tempatpendaratanikan'=> 'required',
            'dpi' => 'required',
            'jenisNelayan' => 'required',
            'umur' => 'required',
            // 'tambahIkan.*.jenis' => 'required',
            // 'tambahIkan.*.jumlah' => 'required',
            // 'tambahIkan.*.bobot' => 'required',
        ]);
        // $asd = $request->tambahIkan;
        // dd($asd);
        // if (($request->tambahIkan[0]["hargaTCT"])!=null && ($request->tambahIkan[0]["bobotTCT"])!=null && ($request->tambahIkan[0]["jenisTCT"])!=null){
            foreach ($request->tambahIkan as $key => $value) {
                // if ($value['jenis']=="Lainnya"){
                    //     $value['jenis'] = $request->jenisIkanLain;
                    //     $value['jumlah'] = $request->jumlahIkanLain;
                    //     $value['bobot'] = $request->bobotIkanLain;
                    // }
                    $value['nelayan']=$request->nelayan;
                    $value['alattangkap']=$request->alatTangkap;
                    $value['jeniskapal']=$request->jenisKapal;
                    
                    $value['namakapal']=$request->namaKapal;
                $value['nokapal']=$request->noKapal;
                $value['jumlahABK']=$request->jumlahABK;
                $value['jenisnelayan']=$request->jenisNelayan;
                $value['umurnelayan']=$request->umur;
                $value['dpi']=$request->dpi;
                $value['tempatpendaratanikan']=$request->tempatpendaratanikan;
                $value['tanggal'] = Carbon::now()->format('Y-m-d');
                DataTangkapan::create($value);
            }
        // }
        
        // elseif(!empty($request->tambahIkanLainnya)){
        //     foreach ($request->tambahIkanLainnya as $key => $value) {
        //         $value['nelayan']=$request->nelayan;
        //         $value['alattangkap']=$request->alatTangkap;
        //         $value['jeniskapal']=$request->jenisKapal;
                
        //         $value['namakapal']=$request->namaKapal;
        //         $value['nokapal']=$request->noKapal;
        //         $value['jumlahABK']=$request->jumlahABK;
        //         $value['jenisnelayan']=$request->jenisNelayan;
        //         $value['umurnelayan']=$request->umur;
        //         $value['dpi']=$request->dpi;
        //         $value['tempatpendaratanikan']=$request->tempatpendaratanikan;
        //         $value['tanggal'] = Carbon::now()->format('Y-m-d');
        //         DataTangkapan::create($value);
        //     }
        // }
        // dd($value);
        // dd($request->tambahIkanLainnya);
        return back()->with('success', 'Data Tangkapan Berhasil Ditambahkan!');
    }

    public function export_excel()
	{
		return Excel::download(new DataExport, 'Data Tangkapan.xlsx');
	}
}
