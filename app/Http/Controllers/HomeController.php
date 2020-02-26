<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $report_datas = Report::where('release', true)->get();;
        return view('home', ['report_datas' => $report_datas]);

    }
}
