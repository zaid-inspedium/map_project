<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\ModuleActions;
use Illuminate\Http\Request;
use DB;

class RolesController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:roles_list');
         $this->middleware('permission:roles_create', ['only' => ['create','store']]);
         $this->middleware('permission:roles_edit', ['only' => ['edit','update']]);
         $this->middleware('permission:roles_destroy', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Roles::where('status','=','Active')->get();

        $actions = ModuleActions::where('status','=','Active')->get();

        return view('admin.roles.index', compact('roles', 'actions'));
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
        
        $new = new Roles;

        $new->name = $request->name;

        $new->save();

        $role = Roles::latest()->first();

        foreach($request->permit as $permit)
        {
            $new1 = DB::table('role_has_permissions')->insert(array('role_id' => $role->id, 'permission_id' => $permit));
        }

        return redirect()->route('roles.index')->with('success','New Role has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(Roles $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Roles::find($id);

        $permission = DB::table('role_has_permissions')
        ->select('permissions.id')
        ->leftjoin('permissions','permissions.id','=','role_has_permissions.permission_id')
        ->where('role_has_permissions.role_id','=',$id)
        ->get();

        if(count($permission) > 0){

        for($p = 0; $p < count($permission); $p++){
            $permissions[$p] = $permission[$p]->id;
        }

    }else{
        $permissions = array();
    }

        $actions = ModuleActions::get();

        return view('admin.roles.edit', compact('role','permissions','actions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $check = DB::table('role_has_permissions')->where('role_id','=',$id)->get();

        if(count($check) > 0)
        {
            $rem = DB::table('role_has_permissions')->where('role_id','=',$id)->delete();
        }

        foreach($request->permit as $permit)
        {
            $new = DB::table('role_has_permissions')->insert(array('role_id' => $id, 'permission_id' => $permit));
        }

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roles $roles)
    {
        //
    }
}
