<?php
function activeMenu($uri = '') {
    $active = '';
    if (Request::is(Request::segment(1) . '/' . $uri . '/*') || Request::is(Request::segment(1) . '/' . $uri) || Request::is($uri)) {
        $active = 'active';
    }
    return $active;
}

function showName($table, $ID){ 
        
        $tables = DB::table($table)
        ->where('id', '=', $ID) 
        ->get();   
       
         foreach($tables as $table){ 
            echo $table->first_name . " " . $table->last_name ;
         }
        
}
function showEmail($table, $ID){  
    $tables = DB::table($table)
    ->where('id', '=', $ID) 
    ->get();   
    
     foreach($tables as $table){ 
        echo $table->email ;
     } 
}
function showUserType($table, $ID){
    $tables = DB::table($table)
    ->where('id', '=', $ID) 
    ->get();   
    foreach($tables as $table){ 
        return $table->user_type;
     }
}

function countUsers($user_type){
    $tables = DB::table('users')
    ->where('user_type', '=', $user_type) 
    ->count();  
    return $tables;
}
function countAllUsers(){
    $tables = DB::table('users') 
    ->count();  
    return $tables;
}

function countRaces(){
    $tables = DB::table('tblraces') 
    ->count();  
    return $tables;
}
function showTitle($table, $ID){ 
    $tables = DB::table($table)
    ->where('id', '=', $ID) 
    ->get();   
     foreach($tables as $table){ 
        echo $table->title;
     }
}
function getSwimmers(){
    $User = DB::table('users')
                    ->where('user_type', '=', 'Swimmer') 
                    ->get();
    return $User;
}

function getParentsDropDown(Type $var = null)
{
    $User = DB::table('users')
        ->where('user_type', '=', 'Parent') 
        ->get();
    return $User;
}

function showTimeSpent($race_id, $user_id)
{
    $result = DB::table('race_results')
    ->where('tblrace_id',  $race_id) 
    ->where('user_id',  $user_id) 
    ->first(); 
    //dd($$result->time_spent;);
    $array = ['timespent'=>$result->time_spent, 'position'=>$result->position]; 
    return $array;
}

 
