<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportResponse extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function report()
    {
        return $this->belongsTo('App\Report');
    }
    public function response()
    {
        return $this->belongsTo('App\Response');
    }
}
