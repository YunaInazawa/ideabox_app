<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Report;
use App\ReportFun;

class MypageController extends Controller
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
        $my_reports = Report::where('user_id', Auth::user()->id)
            ->where('release', true)->get();
        $my_drafts = Report::where('user_id', Auth::user()->id)
            ->where('release', false)->get();
        return view('mypage', ['my_reports' => $my_reports, 'my_drafts' => $my_drafts]);

    }

    public function del( $id = 0 )
    {
        $del_data = Report::find($id);
        $title = $del_data->title;
        $del_data->delete();
        ReportFun::where('report_id', $id)->delete();
        return redirect(route('mypage'))->with('message', $title . ' を削除したよ！');
    }
}
