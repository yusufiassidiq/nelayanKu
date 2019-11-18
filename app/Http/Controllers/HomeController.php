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
            'dpi' => 'required',
            'tambahIkan.*.jenis' => 'required',
            'tambahIkan.*.jumlah' => 'required',
        ]);
            
        foreach ($request->tambahIkan as $key => $value) {
            $value['nelayan']=$request->nelayan;
            $value['alattangkap']=$request->alatTangkap;
            $value['jeniskapal']=$request->jenisKapal;
            $value['dpi']=$request->dpi;
            DataTangkapan::create($value);
        }
        
        // dd($value);
        // $data = new DataTangkapan ([
        //     'nelayan' => $request->nelayan,
        // ]);
        // $data->save();
        return back()->with('success', 'Record Created Successfully.');
    }

    public function listDataPage(){
        $datas = DataTangkapan::all();
        return view('list_data',compact('datas'));
    }

    public function export_excel()
	{
		return Excel::download(new DataExport, 'Data Tangkapan.xlsx');
	}
}
