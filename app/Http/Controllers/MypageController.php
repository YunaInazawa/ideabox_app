<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Report;

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
}
