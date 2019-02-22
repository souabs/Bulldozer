<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use \App\Models\Link;
use Illuminate\Support\Str;
class LinkController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        //select user link's
        $mylinks=Link::where('users_id',Auth::id())->get();
            return view('links.index', [])->with('mylinks',$mylinks);

    }
    public function redirect(Request $request,$code)

    {
        //redirect link
        $mylinks=Link::where('short_link',$code)->get();
        return Redirect::to($mylinks[0]['original_link']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('links.add', [
            []
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->update($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $link = null;
        if($request->id > 0) { $link = link::findOrFail($request->id); }
        else { 
            $link = new Link;
        }
                      
                $link->id = $request->id?:0;
                $link->designation = $request->designation;
                $link->original_link = $request->original_link;
                $link->short_link = config('APP_URL').'/redirect/'.Str::random(6).Auth::id();
                $link->user_id = Auth::id();
                $link->save();
        /*
        test if total of links > 20 --> delete old link

         */
        $total_link=Link::all()->count();
        if ($total_link>20)
            DB::delete('delete from link order bycreated_at DESC limit 1 ');


        return redirect('/links');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {
        
        $link = Link::findOrFail($id);

        $link->delete();
        return "OK";
        
    }
}
