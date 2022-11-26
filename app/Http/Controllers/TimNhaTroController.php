<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Http;

session_start();
class TimNhaTroController extends Controller
{
    
    public function xinvitri()
    {
        return view('user.xinvitri');
    }

    public function showvitri(Request $request)
    {
        $key = "AIzaSyDqP5sPXxnijvR6IdUk6wxtIk4NpWWz8lQ";
        $khoangcach = 3000;
        $lat = $request->lat;
        $long = $request->long;
        $vitri = DB::table('tbl_dangtin')->get();
        $response = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json', [
            'destinations' => $this->vitritoString($vitri),
            'origins' => $lat.','.$long,
            'key' => $key
        ]);['rows'][0];
        if(!$response)
        return Redirect::to('/');
        $data = array([$lat, $long]);
        $i = -1;
        foreach($response['elements'] as $vt)
        {
            $i++;
            if($vt['distance']['value'] < $khoangcach)
            {
                array_push($data, $this->diachiGet($this->vitritoArray($vitri)[$i]  ));
            }
        }
    	return view('user.showvitri', compact('data', 'key') );
    }
    function vitritoString($vitri)
    {
        $dsvitri = "";
        foreach($vitri as $v)
        {
            $dsvitri .= "|".$v->diachi;
        }
        return $dsvitri;
    }
    function vitritoArray($vitri)
    {
        $dsvitri = array();
        foreach($vitri as $v)
        {
            array_push($dsvitri, $v->diachi);
        }
        return $dsvitri;
    }
    function diachiGet($diachi)
    {
        $key = "AIzaSyDqP5sPXxnijvR6IdUk6wxtIk4NpWWz8lQ";
        $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
            'address' => $diachi,
            'key' => $key
        ])->json()['results'][0]['geometry']['location'];
        return [$response['lat'],  $response['lng']];
    }
}
