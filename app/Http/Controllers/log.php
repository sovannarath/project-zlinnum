<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class log extends Controller
{
    static public function set_log($controller,$line,$message){
        $date = Carbon::now('UTC')->addHours(7);
        $myfile = fopen(storage_path('custom-logs/'.$date->format('Y-m-d').".txt"),'a');
        $text = "\n------------- Start ---------------------";
        $text .= "\nDate: ".$date->format('y-m-d H:i:s');
        $text .= "\nError  Controller :".$controller."\nLine: ".$line."\nMessage: ".$message;
        $text .= "\n-------------End -------------------\n";
        fwrite($myfile,$text);
        fclose($myfile);
        return 1;

    }
}
