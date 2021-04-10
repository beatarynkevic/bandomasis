<?php

namespace App\Http\Controllers;

use App\Models\Reservoir;
use Illuminate\Http\Request;
use App\Models\Member;
use Validator;

class ReservoirController extends Controller
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
        $reservoirs = Reservoir::orderBy('area')->get();
        return view('reservoir.index', ['reservoirs' => $reservoirs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::all();
        $reservoirs = Reservoir::all();
        return view('reservoir.create', ['members' => $members, 'reservoirs' => $reservoirs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
        'reservoir_title' => ['required', 'min:3', 'max:64', 'alpha'],
        'reservoir_area' => ['required', 'min:3', 'numeric'],
        'reservoir_about' => ['required', 'min:3', 'max:200']
        ]
        );
        if ($validator->fails()) {
        $request->flash();
        return redirect()->back()->withErrors($validator);
        }
        $reservoir = new Reservoir;
        $reservoir->title = $request->reservoir_title;
        $reservoir->area = $request->reservoir_area;
        $reservoir->about = $request->reservoir_about;
        $reservoir->save();
        return redirect()->route('reservoir.index')->with('success_message', 'Reservoir has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function show(Reservoir $reservoir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservoir $reservoir)
    {
        return view('reservoir.edit', ['reservoir' => $reservoir]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservoir $reservoir)
    {
        $reservoir->title = $request->reservoir_title;
        $reservoir->area = $request->reservoir_area;
        $reservoir->about = $request->reservoir_about;
        $reservoir->save();
        return redirect()->route('reservoir.index')->with('success_message', 'Reservoir has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservoir $reservoir)
    {
        if($reservoir->reservoirMembers->count() !==0){
            return redirect()->back()->with('info_message', 'Trinti negalima, nes turi sunkvežimių');
        }
        $reservoir->delete();
        return redirect()->route('reservoir.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}

// >with('success_message', 'Reservoir has been deleted')