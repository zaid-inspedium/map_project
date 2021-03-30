<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Hash;

class SignupController extends Controller
{
    public function index()
    {
    	return view('admin.auth.register');
    }

    public function fetch_categories(request $request)
    {
        $cats = Categories::where('industry_id','=',$request->get('value'))->get();



echo "<select class='form-control' id='inputCategory' name='category_id' required>
      <option value=''>- Select Category -</option>";
foreach($cats as $cat)
{
echo "<option value='".$cat->id."'>".$cat->name."</option>";
}
echo "</select>";


    }

    public function store(Request $request)
    {

    	$check = User::where('username','=',$request->username)->first();

    	$check1 = User::where('email','=',$request->email)->first();


    	if(!$check && !$check1){


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create([
            'name'=> $input['name'],
            'username'=> $input['username'],
            'email'=> $input['email'],
            'password'=> $input['password'],
            'role_id'=> $input['role_id'],
        ]);
        $user->assignRole($request->input('role_id'));

        return redirect('/congratulations');

    }elseif($check){

    	return redirect()->back()->with('danger','Username '.$request->username.' already taken. Please choose a different username'); 

    }elseif($check1){

    	return redirect()->back()->with('danger','Email '.$request->email.' already in use. Please choose a different email');

    }


    }
}
