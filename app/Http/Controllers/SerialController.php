<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SerialController extends Controller
{
    public function sendCallback(Request $request){
        $data = $request->input('data');
	$port = '/dev/ttyUSB0';
	exec("stty -F $port 9600");
	$serial = fopen($port,  'w+');
	sleep(2);
	fwrite($serial, $data);
	sleep(1);
	#echo fgets($serial);
        fclose($serial);

        return response()->json(['sending'=>$data,'success' => true]);
    }
}
