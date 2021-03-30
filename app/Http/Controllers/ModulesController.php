<?php

namespace App\Http\Controllers;

use App\Models\Modules;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:module_list');
         $this->middleware('permission:module_create', ['only' => ['create','store']]);
         $this->middleware('permission:module_edit', ['only' => ['edit','update']]);
         $this->middleware('permission:module_destroy', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Modules::get();
        return view('admin.modules.index', compact('modules'));
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
        $new = new Modules;

        $new->name = $request->name;
        $new->module_title = $request->title;
        $new->route_name = $request->route;
        $new->tables = $request->table;

        $new->save();

        return redirect()->route('modules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modules  $modules
     * @return \Illuminate\Http\Response
     */
    public function show(Modules $modules)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modules  $modules
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = Modules::find($id);
        $status = array("0" => "Active", "1" => "Inactive");
        return view('admin.modules.edit',compact('module','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modules  $modules
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new = Modules::find($id);
        $new->name = $request->name;
        $new->module_title = $request->module_title;
        $new->route_name = $request->route_name;
        $new->tables = $request->tables;
        $new->status = $request->status;
        $new->update();

        return redirect()->route('modules.index')->with('success','Modules has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modules  $modules
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modules $modules)
    {
        //
    }
}
