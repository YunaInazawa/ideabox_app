<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;

    public function report_tags()
    {
        return $this->hasMany('App\ReportTag');
    }
    public function report_funs()
    {
        return $this->hasMany('App\ReportFun');
    }
    public function report_responses()
    {
        return $this->hasMany('App\ReportResponse');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
