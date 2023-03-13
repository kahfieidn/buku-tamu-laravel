<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\Surat;
use App\Models\Instansi;
use App\Models\Disposisi;
use Carbon\Carbon;
use PDF;
use DB;

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
        $users = User::count();
        $surats = Surat::count();
        $instansis  = Instansi::count();
        $disposisis = Disposisi::count();
        return view('homepage.index', compact('users', 'surats', 'instansis', 'disposisis'));
    }

    public function index_pdf_by_date($start_date, $end_date) {

        dd(["Tanggal Awal : ". $start_date, "Tanggal Akhir : ".$end_date]);

    }


    
}
