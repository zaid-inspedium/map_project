<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Agent::where('status','Active')->get();
        return view('admin.agent.index',compact('data'));
    }

    /**
     * Show the form for add_agent a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_agent(request $request)
    {

        $new = new Agent;

        $new->name = $request->name;
        $new->status = $request->status;

        $new->save();

        return redirect()->route('agent.index')->with('success','Agent has been Added');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $agent = Agent::find($id);
        return view('admin.agent.edit',compact('agent'));
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
        $new = Agent::find($id);

        $new->name = $request->name;
        $new->status = $request->status;

        $new->update();

        return redirect()->route('agent.index')->with('success','Agent has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = Agent::find($id);
        $new->status = "Inactive";
        $new->update();
        return redirect()->route('agent.index')->with('danger','Agent has been deleted!');
    }
}
