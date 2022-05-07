<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_users_race extends Model
{
    use HasFactory;
    public $timestamps=false;

    public function race()
    {
        return $this->belongsTo(tblrace::class);
    }
}
