<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Link;
 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //select list of link's
        $list_links=Link::all();
        return view('welcome')->with('list_links',$list_links);
    }
    public function lang($locale)
    {
        \App::setLocale($locale);
       //return redirect()->action('HomeController@index');   

    }
}
