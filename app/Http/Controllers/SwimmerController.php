<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
class SwimmerController extends Controller
{
    public function viewSwimmers(){ 
        //$User = User::all();
        $User = getSwimmers(); 
        $type = "Swimmers";
        return  view('view-swimmers',['Users'=>$User], ['type'=>$type]);  
    }
    public function viewParents(){  
        $User = DB::table('users')
                    ->where('user_type', '=', 'Parent') 
                    ->get();
                   // print_r($User); exit;
        $type = "Coaches";
        return  view('view-swimmers',['Users'=>$User], ['type'=>$type]);
    }
    public function viewCoaches(){  
        $User = DB::table('users')
                    ->where('user_type', '=', 'Coach') 
                    ->get();
        $type = "Coaches";
        return  view('view-swimmers',['Users'=>$User],  ['type'=>$type]);
    }
}
