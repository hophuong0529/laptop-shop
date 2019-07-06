<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Member;
use App\OrderMethod;
use App\Order;
use App\Product;
use App\OrderDetail;
use App\Price;

class Ccontroller extends Controller
{
	function search($type=null,$id=null,Request $request){
		if($type=='mahang'){

			$products = Product::where('status',1)->where('hangId',$id)->get();

		}elseif ($type=='mucgia') {

			$mucgia=Price::where('id',$id)->first();

			$products=Product::where('status',1)->where('productPrice','>=',$mucgia->priceFrom*1000000)
			->where('productPrice','<=',$mucgia->priceTo*1000000)
			->get();

		}elseif ($type==null){

			$products=Product::where('status',1)->get();	

		}elseif ($type=='findKey'){

			$key=$request->input('keyword');
			$products=Product::where('productName','like','%'.$key.'%')->get();

		}

		return view('home',compact('products'));
	}

	function postLogin(Request $request){

		$username=$request->input('username');

		$password=md5($request->input('password'));

		$result=Member::where('username',$username)->where('password',$password)->first();
		if($result==null){
			$alert='Sai tên đăng nhập hoặc mật khẩu';
			return redirect()->back()->with('alert',$alert);
		}else{
			session(['user'=>$username]);
			return redirect('/');
		}
	}

	function logOut(){
		session()->forget('user');
		return redirect('/');
	}	
}		
