<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;
use App\Imports\UserImport;
use App\User;

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

    public function admin()
    {
        $title  = "Dashboard";
        $active = "admin";
        return view('adminlte/layout', compact('title','active'));
    }

    public function testReportes(){

        //REPORTES EN PDF  DESDE HTML
        /*
        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML('<h1>Styde.net</h1>');
        return $pdf->download('mi-archivo.pdf');
        */

/*
        $data = [
            'titulo' => 'Styde.net'
        ];

        $pdf = \PDF::loadView('pruebaComponentes/reportes', $data);

        return $pdf->stream('archivo.pdf');
*/

        /*EXCEL EXPORTAR*/

        return Excel::download(new UserExport, 'user-list.xlsx');

//        return view('pruebaComponentes/reportes');



    }

    public function importExcel(Request $request){
        $file = $request->file('file');
        Excel::import(new UserImport, $file);

        return back()->with('message', 'Importacion de usuarios compeltada');

    }
}
