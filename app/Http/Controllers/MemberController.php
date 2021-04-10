<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Reservoir;
use Illuminate\Http\Request;

class MemberController extends Controller
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
    public function index(Request $request)
    {

        $members = Member::orderBy('surname')->get();
        $reservoirs = Reservoir::all();
        //FILTRAVIMAS
        // dd($request);
        if($request->id) {
            $members = Member::where('reservoir_id', $request->id)->get();
            $filterBy = $request->reservoir_id;
        }
        else {
            $members = Member::orderBy('surname')->get();
        }

        return view('member.index', [
            'reservoirs' => $reservoirs,
            'members' => $members,
            'filterBy' => $filterBy ?? 0
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservoirs = Reservoir::orderBy('title')->get();

        return view('member.create', ['reservoirs' => $reservoirs]);
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
        'author_name' => ['required', 'min:3', 'max:64'],
        'author_surname' => ['required', 'min:3', 'max:64'],
        ],
        [
        'author_surname.min' => 'mano zinute'
        ]
        );
        if ($validator->fails()) {
        $request->flash();
        return redirect()->back()->withErrors($validator);
        }
        $member = new Member;
        $member->name = $request->member_name;
        $member->surname = $request->member_surname;
        $member->live = $request->member_live;
        $member->experience = $request->member_experience;
        $member->registered = $request->member_registered;
        $member->reservoir_id = $request->reservoir_id;

        $member->save();
        return redirect()->route('member.index')->with('success_message', 'Member had been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $reservoirs = Reservoir::all();
        return view('member.edit', ['member' => $member,  'reservoirs' => $reservoirs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $member->name = $request->member_name;
        $member->surname = $request->member_surname;
        $member->live = $request->member_live;
        $member->experience = $request->member_experience;
        $member->reservoir_id = $request->reservoir_id;

        $member->save();
        return redirect()->route('member.index')->with('success_message', 'Outfit had been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('member.index')->with('info_message', 'Outfit has been destroyed');
    }
}
