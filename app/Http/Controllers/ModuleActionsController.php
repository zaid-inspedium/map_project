<?php

namespace App\Http\Controllers;

use App\Models\ModuleActions;
use App\Models\Modules;
use Illuminate\Http\Request;

class ModuleActionsController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:permission_list');
         $this->middleware('permission:permission_create', ['only' => ['create','store']]);
         $this->middleware('permission:permission_edit', ['only' => ['edit','update']]);
         $this->middleware('permission:permission_destroy', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actions = ModuleActions::select('permissions.id','permissions.name', 'modules.module_title', 'permissions.status')
        ->leftjoin('modules','modules.id','=','permissions.module_id')
        ->get();

        $modules = Modules::where('status','=','Active')->get();

        return view('admin.permissions.index', compact('actions','modules'));
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
        $prefix = Modules::where('id','=',$request->module)->first();

        $new = new ModuleActions;

        $new->name = $prefix->name.'_'.$request->name;
        $new->module_id = $request->module;

        $new->save();

        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ModuleActions  $moduleActions
     * @return \Illuminate\Http\Response
     */
    public function show(ModuleActions $moduleActions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModuleActions  $moduleActions
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = ModuleActions::find($id);
        $status = array("0" => "Active", "1" => "Inactive");
        return view('admin.permissions.edit',compact('permission','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ModuleActions  $moduleActions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new = ModuleActions::find($id);
        $new->name = $request->name;
        $new->status = $request->status;
        $new->update();

        return redirect()->route('permissions.index')->with('success','Permission has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModuleActions  $moduleActions
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModuleActions $moduleActions)
    {
        //
    }
}
