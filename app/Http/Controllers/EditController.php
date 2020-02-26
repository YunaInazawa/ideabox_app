<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditController extends Controller
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
        return view('edit');
    }

    public function ok( Request $request )
    {
        $request->session()->regenerateToken();   // リロード等での二重送信防止
        $title = $request->title;
        $what = $request->what;
        //機能いっぱい
        $reason = $request->reason;
        //タグいっぱい
        $release = $request->release;   // on or ''
        return view('success', ['title' => $title, 'what' => $what, 'reason' => $reason, 'release' => $release]);
        //return redirect(route('success'));
    }
}
