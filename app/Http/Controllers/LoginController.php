<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class LoginController extends Controller
{
    //public function postLogin(Request $request){
    	
    // 	// dd($request->all());
    // 	$validator = validator($request->all(),[
    // 			'email' => 'required|min:3|max:100',
    // 			'password' => 'required|min:3|max:100',
    // 		]);
    // 	// dd($request->fails());
    // 	if ($validator->fails()){
    // 		return redirect('/admin/login')
    // 				->withErrors($validator)
    // 				->withInput();
    // 	}
    	
    // 	// return view('admin.index');
    // 	$credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];

    // 	if ( auth()->guard('admin')->attempt($credentials) ){
    // 		return redirect('/admin');
    // 	}else{
    // 		return redirect('/admin/login')
    // 			->withErrors(['errors' => 'Login Invalid'])
    // 			->withInput();
    // 	}
    // }
    // 
    public function Login(){
    	return view('auth.login');
    }

    public function testLogin(Request $request){
    	$validator = validator($request->all(),[
    			'email' => 'required|min:5|max:100',
    			'password' => 'required|min:5|max:30',
    		]);
    	if($validator->fails()){
    		return redirect('/login')
    			->withErrors($validator)
    			->withInput();
    	}
    
    	$credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];

    	if(auth()->guard('admin')->attempt($credentials)){
    		return redirect('/admin');
	    }else if(auth()->guard('web')->attempt($credentials)){
	    	return redirect ('/home');
	    }else{
	    	return redirect ('/login')
	    		->withErrors(['errors'=> 'Login invallid'])
	    		->withInput();
	    }
    }


    public function logout(){
    	auth()->guard('web')->logout();
	    	return redirect ('/login');
	}
    

}
