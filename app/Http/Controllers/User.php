<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Modeluser;

use Session;
use FILE;


class User extends Controller
{
    //
	public function listuser(){
		$user = Modeluser::all();
		return view('userlist',array('users'=>$user));
	}
	public function createuser(){
		return view('create');
	}
	public function edituser($id){
		$user = Modeluser::find($id);
		return view('create',compact('user'));
	}
	public function loginsubmit(Request $req){
		
		Modeluser::select('*')->where(
			array(
				array('email','=',$req->email),
				array('password','=',$req->pwd)
			)
		)->get();
		$req->session()->put('logData',array($req->input()));

		return redirect('/userlist');
	}
	public function createsubmit(Request $req){
		$req->validate([
	        'name' => 'required',
	        'email' => 'required|email|unique:modelusers,email',
	        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
	        'pwd' => [
			            'required',
			            'string',
			            'min:10',             // must be at least 10 characters in length
			            'regex:/[a-z]/',      // must contain at least one lowercase letter
			            'regex:/[A-Z]/',      // must contain at least one uppercase letter
			            'regex:/[0-9]/',      // must contain at least one digit
			            'regex:/[@$!%*#?&]/', // must contain a special character
			        ],
	    ]);
	    $user = new Modeluser;

		if ($req->hasFile('image')) {
			$image = $req->file('image');
			$name = str_slug($req->name).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/uploads');
			$imagePath = $destinationPath. "/".  $name;
			$image->move($destinationPath, $name);
			$user->image = $name;
		}		
		$user->name = $req->name;
		$user->email = $req->email;
		$user->password = $req->pwd;
		$response = $user->save();
		if($response){
			return redirect('/userlist');
		}
	}
	public function deleteuser($id){
		$user = Modeluser::find($id);

	    $response = $user->delete();
		if($response){
			return redirect('/userlist');
		}
	}
	public function updateuser(Request $req,$id){
		$req->validate([
	        'name' => 'required',
	        'email' => 'required|email|unique:modelusers,email,'.$id,
	        'pwd' => [
			            'required',
			            'string',
			            'min:10',            
			            'regex:/[a-z]/',     
			            'regex:/[A-Z]/',      
			            'regex:/[0-9]/',      
			            'regex:/[@$!%*#?&]/',
			        ],
	    ]);

		$user = Modeluser::find($id);

		if ($req->hasFile('image')) {
			$image = $req->file('image');
			$name = str_slug($req->name).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/uploads');
			$imagePath = $destinationPath. "/".  $name;
			$image->move($destinationPath, $name);
			$user->image = $name;
		}
		
		$user->name = $req->name;
		$user->email = $req->email;
		$user->password = $req->pwd;
		$response = $user->save();
		if($response){
			return redirect('/userlist');
		}
	}
	public function doLogout(){
	    Session::forget('logData');  
	    return redirect('/');
	  
	}
}