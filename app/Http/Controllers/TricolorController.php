<?php

namespace App\Http\Controllers;

use App\Jobs\TricolorJobs;
use App\Models\Tricolor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TricolorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $tricolor = Tricolor::all();
        return view('home', compact('tricolor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'ok';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tricolor  $tricolor
     * @return \Illuminate\Http\Response
     */
    public function show(Tricolor $tricolor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tricolor  $tricolor
     * @return \Illuminate\Http\Response
     */
    public function edit(Tricolor $tricolor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tricolor  $tricolor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tricolor $tricolor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tricolor  $tricolor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tricolor $tricolor)
    {
        //
    }

    public function start(){
        $tricolor = Tricolor::all();
        foreach($tricolor as $index => $item){
            if($index % 2 == 0){
                $data = array(
                    "green" => 1,
                    "red" => 0,
                    "yellow" => 0
                );
                $item->update($data);
            }else{
                $data = array(
                    "green" => 0,
                    "red" => 1,
                    "yellow" => 0
                );
                $item->update($data);
            }
        }
        TricolorJobs::dispatch('status')->delay(now()->addMinutes(1));
        return $tricolor;
    }

    public function stop(){
        $tricolor = Tricolor::all();
        foreach($tricolor as $index => $item){
            $data = array(
                "green" => 0,
                "red" => 0,
                "yellow" => 0
            );
            $item->update($data);
        }
        DB::table('jobs')->truncate();
        return $tricolor;
    }

    public function all(){
        $tricolor = Tricolor::all();
        return $tricolor;
    }
}
