<?php
namespace App\Http\Controllers;
use DB;
class TestController extends Controller
{
    public function testConnection(){
        $con = DB::connection()->getPdo();
        if($con){
            return "connecté".DB::connection()->getDatabaseName();
        }else{
            return "non connecté";
        }
    }
}
