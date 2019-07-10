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
	function index($action=null){

		if($action=='logout'){

			session()->forget('user');
			return redirect('/');

		}else{

			if ($action==null){

				$this->data['title'] = 'Trang chủ';
				$products=Product::where('status',1)->get();
				$this->data['products'] = $products ?? [];
				$action='home';

			}elseif ($action=='login'){

				$this->data['title'] = 'Đăng nhập';

			}elseif ($action=='register'){

				$this->data['title'] = 'Đăng ký';

			}elseif ($action=='order'){

				$this->data['title'] = 'Đặt hàng';
				$member = Member::where('username',session('user'))->first();
				$ordermethods = OrderMethod::where('status',1)->get();
				$this->data['member'] = $member ?? [];
				$this->data['ordermethods'] = $ordermethods ?? [];

			}elseif($action=='viewInfo' || $action=='changeInfo'){

				$member = Member::where('username',session('user'))->first();
				$this->data['member'] = $member ?? [];
				$this->data['title'] = 'Thông tin tài khoản';

			}elseif($action=='detailProduct'){
				
				
			}
			return view("$action",$this->data);

		}

	}

	function search($action=null,$id=null,Request $request){

		if($action=='mahang'){

			$this->data['title'] = 'Kết quả tìm kiếm';
			$products = Product::where('status',1)->where('hangId',$id)->get();

		}elseif ($action=='mucgia') {

			$this->data['title'] = 'Kết quả tìm kiếm';
			$mucgia=Price::where('id',$id)->first();

			$products=Product::where('status',1)->where('productPrice','>=',$mucgia->priceFrom*1000000)
			->where('productPrice','<=',$mucgia->priceTo*1000000)
			->get();	

		}elseif ($action=='findKey'){

			$this->data['title'] = 'Kết quả tìm kiếm';
			$key=$request->input('keyword');
			$products=Product::where('productName','like','%'.$key.'%')->get();		
		}

		$this->data['products'] = $products ?? [];
		return view('home',$this->data);
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
			echo "<script>alert('Đăng nhập thành công !'); location='.'</script>";
		}
	}

	function postRegister(Request $request){

		$username=$request->input('username');
		$result=Member::where('username',$username)->first();

		if($result!=null){

			$alert='Tên đăng nhập đã tồn tại. Vui lòng nhập lại';
			return redirect()->back()->with('alert',$alert);

		}else{

			$password=md5($request->input('password'));
			$fullname=$request->input('fullname');
			$mobile=$request->input('mobile');
			$email=$request->input('email');
			$address=$request->input('address');

			Member::insert([
				'username'=>$username,
				'password'=>$password,
				'fullname'=>$fullname,
				'mobile'=>$mobile,
				'email'=>$email,
				'address'=>$address
			]);

			session(['user'=>$username]);
			echo "<script>alert('Đăng ký thành công !'); location='.'</script>";
		}
	}

	function cart($action=null,$id=null,Request $request){
		switch ($action) {
			case 'order':
			if(session('user')):
				return redirect('order');
			else:
				return redirect('login');	
			endif;	
			break;	
			case 'update':
			foreach (array_keys(session('cart')) as $key) {
				session(["cart.$key"=>$request->input($key)]);
			}
			return redirect("cart");
			break;
			case 'add':
				if(session("cart.$id")){
					session(["cart.$id"=>session("cart.$id")+1]);
				}else{
					session(["cart.$id"=>1]);	
				}
				return redirect('cart');
				break;
		
			case 'delete':
				session()->forget("cart.$id");
				return redirect('cart');
				break;	
			case 'deleteall':
				session()->forget('cart');
				return redirect('cart');
				break;

			default:
				return view('cart');
				break;	
		}
	}

	public function postOrder(Request $request)
	{
		$member=Member::where('username',session('user'))->first();
		$userId=$member->id;
		$methodId=$request->input('methodId');
		Order::insert([
			'userId'=>$userId,
			'methodId'=>$methodId,
			'orderDate'=>now()
		]);
		$order = Order::orderBy('id','desc')->first();
		$orderId = $order->id;
		foreach (array_keys(session('cart')) as $productId):
			$quantity = session("cart.$productId");
			$price = Product::where('id',$productId)->first()->productPrice;
			OrderDetail::insert([
				'orderId'=>$orderId,
				'productId'=>$productId,
				'quantity'=>$quantity,
				'price'=>$price
			]);
		endforeach;
		return redirect()->back()->with('alert','success');
	}

	public function updateInfo(Request $request){

		Member::where('username',session('user'))->update([
			'fullName'=>$request->input('fullName'),
			'mobile'=>$request->input('mobile'),
			'email'=>$request->input('email'),
			'address'=>$request->input('address')
		]);
		
		return redirect()->back();
	}

	public function showDetail($id){

		$product = Product::where('id',$id)->first();
		$this->data['product'] = $product ?? [];
		$this->data['title'] = 'Thông tin chi tiết sản phẩm';
		
		return view('detailProduct',$this->data);

	}

}		
