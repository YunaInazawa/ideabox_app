<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportFun extends Model
{
    use SoftDeletes;

    public function report()
    {
        return $this->belongsTo('App\Report');
    }
}
