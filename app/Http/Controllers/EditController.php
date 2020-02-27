<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Report;
use App\Tag;
use App\ReportFun;
use App\ReportTag;
use Carbon\Carbon;

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
        // バリデーション
        $validator = $request->validate([
            'title' => 'required',
            'what' => 'required',
        ]);

        $request->session()->regenerateToken();   // リロード等での二重送信防止
        $now_time = Carbon::now();
        $title = $request->title;
        $what = $request->what;
        $kinou_num = $request->kinou_num;
        
        //機能いっぱい
        for($i = 1; $i <= $kinou_num; $i++){
            $kinou_str = 'kinou' . $i;
            $syosai_str = 'syosai' . $i;
            if(isset($request->$kinou_str)){ $kinou[] = $request->$kinou_str; }
            if(isset($request->$syosai_str)){ $syosai[] = $request->$syosai_str; }
        }

        $reason = $request->reason;
        $note = $request->note;
        $tag_num = $request->tag_num;
        
        //タグいっぱい
        for($i = 1; $i <= $tag_num; $i++){
            $tag_str = 'tag' . $i;
            if(isset($request->$tag_str)){ $tags[] = $request->$tag_str; }
        }
        
        $release = $request->release;   // on or ''

        // DB登録(Report)
        $add_report = new Report;
        $add_report->title = $title;
        $add_report->user_id = Auth::user()->id;
        $add_report->main = $what;
        if(isset($reason)){ $add_report->reason = $reason; }
        if(isset($note)){ $add_report->note = $note; }
        $add_report->release = $release == 'on' ? true : false;
        $add_report->created_at = $now_time;
        $add_report->updated_at = $now_time;
        $add_report->save();

        // DB登録(ReportFun)
        if( isset($kinou) ){
            for( $i = 0; $i < count($kinou); $i++ ){
                $add_fun = new ReportFun;
                $add_fun->report_id = $add_report->id;
                $add_fun->fun = $kinou[$i];
                $add_fun->fun_detail = $syosai[$i];
                $add_fun->created_at = $now_time;
                $add_fun->updated_at = $now_time;
                $add_fun->save();
            }
        }

        // DB登録(Tag + ReportTag)
        if( isset($tags) ){
            for( $i = 0; $i < count($tags); $i++ ){
                $db_tag = Tag::where('main', $tags[$i])->first();
                if( $db_tag == null ){
                    $db_tag = new Tag;
                    $db_tag->main = $tags[$i];
                    $db_tag->created_at = $now_time;
                    $db_tag->updated_at = $now_time;
                    $db_tag->save();
                }
    
                $add_tag = new ReportTag;
                $add_tag->report_id = $add_report->id;
                $add_tag->tag_id = $db_tag->id;
                $add_tag->created_at = $now_time;
                $add_tag->updated_at = $now_time;
                $add_tag->save();
            }
        }

        return redirect(route('success'));
    }

    public function edit( $id = 0 ){
        $report_data = Report::find($id);
        $kinou_data = ReportFun::where('report_id', $id)->get();
        $tags_data = ReportTag::where('report_id', $id)->get();

        return vire('edit', ['report_data' => $report_data, 'kinou_data' => $kinou_data, 'tags_data' => $tags_data]);
    }
}
