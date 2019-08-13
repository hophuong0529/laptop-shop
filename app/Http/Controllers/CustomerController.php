<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Member;
use App\OrderMethod;
use App\Order;
use App\Product;
use App\OrderDetail;
use App\Price;
use App\News;
use App\Feedback;

class CustomerController extends Controller
{
	public function index(){

		$this->data['title'] = 'Laptop';
		$products=Product::where('status',1)->where('id','<=',16)->get();
		$this->data['products'] = $products ?? [];
		$news= News::whereIn('id', [3,2,5])->get();
		$this->data['news'] = $news ?? [];
		return view('guest.home',$this->data);
	}

	public function page2(){

		$this->data['title'] = 'Laptop';
		$products=Product::where('status',1)->where('id','>',16)->get();
		$this->data['products'] = $products ?? [];
		$news= News::whereIn('id', [3,2,5])->get();
		$this->data['news'] = $news ?? [];
		return view('guest.home',$this->data);
	}


	public function introduce(){

		$this->data['title'] = 'Giới thiệu';
		$news= News::whereIn('id', [3,2,5])->get();
		$this->data['news'] = $news ?? [];	
		return view('guest.introduce',$this->data);
	}

	public function contact(){

		$this->data['title'] = 'Liên hệ';
		$news= News::whereIn('id', [3,2,5])->get();
		$this->data['news'] = $news ?? [];	
		return view('guest.contact',$this->data);
	}

	public function register(){

		$this->data['title'] = 'Đăng ký';
		$news= News::whereIn('id', [3,2,5])->get();
		$this->data['news'] = $news ?? [];	
		return view('guest.register',$this->data);
	}

	public function login(){

		$this->data['title'] = 'Đăng nhập';	
		$news= News::whereIn('id', [3,2,5])->get();
		$this->data['news'] = $news ?? [];
		return view('guest.login',$this->data);
	}
	
	public function order(){

		$this->data['title'] = 'Đặt hàng';
		$news= News::whereIn('id', [3,2,5])->get();
		$this->data['news'] = $news ?? [];
		$member = Member::where('username',session('user'))->first();
		$ordermethods = OrderMethod::where('status',1)->get();
		$this->data['member'] = $member ?? [];
		$this->data['ordermethods'] = $ordermethods ?? [];

		return view('user.order',$this->data);
	}

	public function viewInfo(){

		$this->data['title'] = 'Thông tin tài khoản';
		$news= News::whereIn('id', [3,2,5])->get();
		$this->data['news'] = $news ?? [];
		$member = Member::where('username',session('user'))->first();
		$this->data['member'] = $member ?? [];

		return view("user.viewInfo",$this->data);
	}	

	public function changeInfo(){

		$this->data['title'] = 'Chỉnh sửa thông tin tài khoản';	
		$news= News::whereIn('id', [3,2,5])->get();
		$this->data['news'] = $news ?? [];
		$member = Member::where('username',session('user'))->first();
		$this->data['member'] = $member ?? [];


		return view("user.changeInfo",$this->data);	
	}	


	public function search($action=null,$id=null,Request $request){

		if($action=='mahang'){

			$products = Product::where('status',1)->where('brandId',$id)->get();

		}elseif ($action=='mucgia') {

			$mucgia=Price::where('id',$id)->first();

			if(empty($mucgia->priceTo)){

				$products=Product::where('status',1)->where('productPrice','>=',$mucgia->priceFrom*1000000)->get();
			}else{

				$products=Product::where('status',1)->where('productPrice','>=',$mucgia->priceFrom*1000000)
				->where('productPrice','<=',$mucgia->priceTo*1000000)
				->get();
			}	

		}elseif ($action=='findKey'){

			$key=$request->input('keyword');
			$products=Product::where('productName','like','%'.$key.'%')->get();		
		}

		$this->data['products'] = $products ?? [];
		$this->data['title'] = 'Kết quả tìm kiếm';
		$news= News::whereIn('id', [3,2,5])->get();
		$this->data['news'] = $news ?? [];
		return view('guest.home',$this->data);
	}

	public function postLogin(Request $request){

		$username=$request->input('username');
		$password=md5($request->input('password'));

		$messages = [
			'username.required' => 'Tên đăng nhập không được để trống',
			'password.required' => 'Mật khẩu không được để trống',
			'password.min' => 'Mật khẩu tối thiểu 6 kí tự',
		];

		Validator::make($request->all(), [
			'username' => 'required',
			'password' => 'required|min:6',
		], $messages)->validate();

		$result=Member::where('username',$username)->where('password',$password)->first();
		if($result==null){
			$alert='Sai tên đăng nhập hoặc mật khẩu';
			return redirect()->back()->with('alert',$alert);
		}else{
			session(['user'=>$username]);
			echo "<script>alert('Đăng nhập thành công !'); location='.'</script>";
		}
	}

	public function postRegister(Request $request){

		$username=$request->input('username');
		$result=Member::where('username',$username)->first();

		$messages = [
			'username.required' => 'Tên đăng nhập không được để trống',
			'fullname.required' => 'Vui lòng nhập tên khách hàng',
			'mobile.required' => 'Số điện thoại không được để trống',
			'mobile.min' => 'Số điện thoại không đúng. Vui lòng nhập lại',
			'address.required' => 'Địa chỉ không được để trống',
			'email.required' => 'Email không được để trống',
			'email.email' => 'Email không đúng. Vui lòng nhập lại',
			'username.unique' => 'Tên đăng nhập đã tồn tại. Vui lòng nhập lại',
			'password.required' => 'Mật khẩu không được để trống',
			'password.min' => 'Mật khẩu tối thiểu 6 kí tự',
		];

		Validator::make($request->all(), [
			'username' => 'required|unique:members',
			'fullname' => 'required',
			'address' => 'required',
			'email' => 'required|email',
			'mobile' => 'required|min:10',
			'password' => 'required|min:6',
		], $messages)->validate();

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

	public function cart($action=null,$id=null,Request $request){
		switch ($action) {

			case 'order':				
			return redirect('order');	
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
			$this->data['title'] = 'Giỏ hàng của bạn';
			$news= News::whereIn('id', [3,2,5])->get();
			$this->data['news'] = $news ?? [];	
			return view('guest.cart',$this->data);
			break;	
		}
	}

	public function postOrder(Request $request){
		
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
		session()->forget("cart");
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

	public function detailProduct($id){

		$news= News::whereIn('id', [3,2,5])->get();
		$this->data['news'] = $news ?? [];
		$product = Product::find($id);
		$this->data['title'] = $product->productName;
		$this->data['product'] = $product ?? [];
		
		return view('guest.detailProduct',$this->data);
	}

	public function detailNew($id){

		
		$news= News::whereIn('id', [3,2,5])->get();
		$this->data['news'] = $news ?? [];
		$new= News::find($id);
		$this->data['title'] = $new->title;
		$this->data['new'] = $new ?? [];
		
		return view('guest.detailNew',$this->data);
	}

	public function news(){

		$this->data['title'] = 'Tin tức';
		$news= News::whereIn('id', [3,2,5])->get();
		$this->data['news'] = $news ?? [];
		$newss= News::get();
		$this->data['newss'] = $newss ?? [];
		return view('guest.showNews',$this->data);
	}

	public function logout(){

		session()->forget('user');
		if(session('cart')){
			session()->forget('cart');
		}
		return redirect('/');
	}

	public function postContact(Request $request){

		$sender=$request->input('sender');
		$mobile=$request->input('mobile');
		$email=$request->input('email');
		$title=$request->input('title');
		$content=$request->input('content');

		$messages = [
			'sender.required' => 'Vui lòng nhập tên khách hàng',
			'mobile.required' => 'Số điện thoại không được để trống',
			'mobile.min' => 'Số điện thoại không đúng. Vui lòng nhập lại',
			'email.required' => 'Email không được để trống',
			'email.email' => 'Email không đúng. Vui lòng nhập lại',
			'title.required' => 'Tiêu đề không được để trống',
			'content.required' => 'Nội dung không được để trống',
		];

		Validator::make($request->all(), [
			'sender' => 'required',
			'email' => 'required|email',
			'mobile' => 'required|min:10',
			'title' => 'required',
			'content' => 'required'
		], $messages)->validate();

		Feedback::insert([

			'sender'=>$sender,
			'mobile'=>$mobile,
			'email'=>$email,
			'title'=>$title,
			'content'=>$content
		]);
		echo "<script>alert('Gửi thư thành công ! Vui lòng chờ phản hồi của chúng tôi.'); 
		location='.'</script>";	

	}
}	

