<?php 
namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblrace extends Model
{
    use HasFactory;
    public $timestamps=false; 

    public function users(){
        return $this->belongsToMany(User::class, 'tbl_users_races');
   }

   public function results(){
       return $this->hasMany(RaceResult::class,'tblrace_id','id');
   }  

}
