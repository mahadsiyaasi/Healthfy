<?php

namespace Healthfy\Http\Controllers;

use Illuminate\Http\Request;
use Healthfy\Models\Healthfeed;
use Auth;
use Validator;
use Healthfy\Controllers\labController;
class feedController extends Controller
{
    public function index(){
    	return view('healthfeed.feedview')->with("feednews",Healthfeed::all());
    }
   public function registerFeed(Request $data)
   {
   		$validate = Validator::make($data->all(),[
   		'title'=>'required|min:3|max:500',
        'image_title'=>'required|min:3|image',
        'post'=>'required|min:40',
        'image_post'=>'required|min:3|image',
        ]);
        if ($validate->fails()) {        	
           return redirect()->back()->withInput()->withErrors($validate);
        }else{
        	Healthfeed::create([
        		'title'=>$data->title,
		        'image_title'=>$data->image_title,
		        'post'=>$data->post,
		        'image_post'=>$data->image_post,
		        'date'=>now(),
		        'user_id'=>Auth::user()->id,
		        'updated_at'=>now(),
		        'status_id'=>1,
        	]);
        	return  redirect("/healthfeed")->back()->withInput();//;labController::getMessages('success','success.success');
        }
   }
}
