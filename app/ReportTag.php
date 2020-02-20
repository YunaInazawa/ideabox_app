<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportTag extends Model
{
    use SoftDeletes;

    public function report()
    {
        return $this->belongsTo('App\Report');
    }
    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }
}
