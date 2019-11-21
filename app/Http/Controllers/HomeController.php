<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Tour::where('user_id',Auth::user()->id)->get();
        
        $rows = array();

        foreach($data as $dt => $c){
            $rows[] = $c;
        }

        $indexed = collect($rows);
        $result = $indexed->toArray();

        return view('hello',compact('result','data'));
    }

    //leaflet js
    // public function lf()
    // {
    //     $data = Tour::where('user_id',Auth::user()->id)->get();
        
    //     $rows = array();

    //     foreach($data as $dt => $c){
    //         $rows[] = $c;
    //     }

    //     $indexed = collect($rows);
    //     $result = $indexed->toArray();

    //     return view('leaflet',compact('result'));
    // }

    public function store(Request $request)
    {
        $data = new Tour;

        $data->title = $request->title;
        $data->description = $request->description;
        $data->lat = $request->lat;
        $data->lng = $request->lng;
        $data->category = $request->cat;
        $data->user_id = Auth::user()->id;
        $data->save();
        return  redirect('/home');
    }

}
