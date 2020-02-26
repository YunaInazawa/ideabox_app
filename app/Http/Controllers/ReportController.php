<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\ReportTag;

class ReportController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index( $id = 0 )
    {
        $report_data = Report::find($id);
        $tags = ReportTag::where('report_id', $id)->get();
        return view('report', ['report_data' => $report_data, 'tags' => $tags]);

    }
}
