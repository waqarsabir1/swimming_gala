<?php
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Models\Tblrace;
use App\Models\RaceResult;
use DB;


class ResultController extends Controller
{
    //
    public function ajaxRequestStore(Request $request)
    { 
        $race = Tblrace::find($request->race_id); 
        $race->results()->updateOrCreate([
            'user_id'       =>$request->user_id,
        ],[
            'time_spent'    =>$request->timespent,
            'position'      =>$request->position, 
        ]); 

        return response()->json(['success'=>'Result added successfully.']);
    }
}
