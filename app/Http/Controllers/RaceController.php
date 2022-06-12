<?php
namespace App\Http\Controllers;
use App\Models\Tblrace;
use App\Models\tbl_users_race;
use Illuminate\Http\Request;
use DB;
use Auth;
class RaceController extends Controller
{
    function ViewRace(Request $req){
        $User = DB::table('users')
        ->where('user_type', '=', 'Swimmer') 
        ->get(); 
        return  view('add-race',['Users'=>$User]); 
    } 

    function ViewRaces(Request $req){
       

        if(Auth::user()->user_type != 'Administrator' && !Auth::user()->user_type != 'Coach'){
            $user = Auth::user(); 
            $tblraces = $user->races;
        }else{
            $TblRace            = new TblRace;
            $tbl_users_race     = new tbl_users_race;
            $tbl_users_race    = $tbl_users_race->get();  
            $tblraces = $TblRace->get(); 
        }

        return  view('view-races',['rows'=>$tblraces]); 
    }
    
    public function editRace($id){
        $row = Tblrace::find($id);
        $raceSwimmers   = $row->users->pluck('id')->toArray();      
        $swimmers      = getSwimmers(); 
        return  view('edit-race',['row'=>$row, 'swimmers'=>$swimmers, 'raceSwimmers'=>$raceSwimmers]); 
    }
     //
     public function AddRaceData(Request $req){ 
        $TblRace = new TblRace;  
        //dd($req->all());
        $TblRace->title=$req->title; 
        $TblRace->length=$req->length; 
        $TblRace->start_date=$req->start_date;
        $TblRace->start_time=$req->start_time;  
        $TblRace->end_date=$req->end_date;
        $TblRace->end_time=$req->end_time; 
        $TblRace->status =  1;
        $TblRace->save();  
        $race_id = $TblRace->id; 
        //$swimmer_ids = $req->swimmer_ids;
        //dd($TblRace->id);
        $swimmer_ids = $req->swimmer_ids;  
        foreach($swimmer_ids as $swimmer_id){
            $tbl_users_race = new tbl_users_race;  
            $tbl_users_race->user_id= $swimmer_id;
            $tbl_users_race->tblrace_id = $TblRace->id;
            $tbl_users_race->save();      
            //$tbl_users_race->id;  //get last insert id
        }  

         return redirect("races/add-race")->with('message', 'Race Added Successfuly'); 
    }

    public function updateRace(Request $req){
        $ID = $req->id;  
        $TblRace = TblRace::find($ID); 
        $tbl_users_race = new tbl_users_race;
        $TblRace->title=$req->title;  
        $TblRace->length=$req->length;   
        $TblRace->start_date=$req->start_date;
        $TblRace->start_time=$req->start_time;  
        $TblRace->end_date=$req->end_date;
        $TblRace->end_time=$req->end_time; 
        $TblRace->save();
        $swimmer_ids = $req->swimmer_ids;  

        $tbl_users_race = DB::table('tbl_users_races')
        ->where('tblrace_id', '=', $ID);
        $tbl_users_race->delete();
        foreach($req->swimmer_ids as $req->swimmer_id){
            $tbl_users_race = new tbl_users_race;
            $tbl_users_race->user_id= $req->swimmer_id;
            $tbl_users_race->tblrace_id = $ID; 
            $tbl_users_race->save();  
            //$tbl_users_race->id;  //get last insert id
        }

        return redirect("edit-race/$ID")->with('message', 'Race Updated Successfuly');
    }

    function raceDetail(Request $req){ 
        $ID = $req->id;
        $TblRace = TblRace::find($ID);  
        $swimmers = $TblRace->users;    
        //dd($swimmers);
        return  view('race-details',['RaceData'=>$TblRace, 'swimmers'=>$swimmers]);
    }

    function deleteRace($id){
        $tblrace = tblrace::find($id);
        $tblrace->delete();
        return redirect("races/view-races/")->with('message', 'Race Deleted Successfuly');
    }
    
    function getSwimmersOfThisRace($race_id){
        $race = Tblrace::find($race_id);

        $swimmers = $racep->users()->pluck('id')->toArray();
        //dd($swimmers);
        $User = DB::table('tbl_users_races')
        ->where('tblrace_id', '=', $race_id) 
        ->get();
        return $User;
    }
    
}
