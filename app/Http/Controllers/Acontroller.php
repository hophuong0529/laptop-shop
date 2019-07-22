<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Admin;
use App\Product;
use App\Brand;
use App\Orderdetail;
use App\Order;
use App\Member;
use App\News;


class Acontroller extends Controller
{
    public function index()
    {
    	if (!session('userAdmin')) {
    		return view('admin.login');
    	}else{
    		$products=DB::table('brands as a')->join('products as b','a.id','b.hangId')->get();
            $orderDetails=OrderDetail::select('productId')->get();
            $this->data['products'] = $products ?? [];
            $this->data['orderDetails'] = $orderDetails ?? [];
            $this->data['title'] = 'Danh sách sản phẩm';
            return view('admin.product.productShow',$this->data);
        }
    }

    public function orders(){
        $orders = Order::all();
        $this->data['orders'] = $orders ?? [];
        $this->data['title'] = 'Danh sách hóa đơn';
        return view('admin.order.orderShow',$this->data);
    }

    public function orderEdit($id){

        $order = Order::find($id);
        $this->data['order'] = $order ?? [];
        $this->data['title'] = 'Chỉnh sửa thông tin';
        return view('admin.order.orderEdit',$this->data);
    }

    public function orderDelete($id){

        Order::where('id',$id)->delete();
        return redirect()->back();
    }

    public function postOrderEdit($id, Request $request){
        $status = $request->status;
        Order::where('id',$id)->update(['status'=>$status]);
        return redirect()->back();
    }    

    
    public function postLoginAdmin(Request $request)
    {

    	$username=$request->username;
    	$password=md5($request->password);
    	$admin=Admin::where('username',$username)->where('password',$password)->get();
    	if(count($admin)==0){
    		return redirect()->back()->with('alert','Wrong username or password!!!');
    	}else{
    		session(['userAdmin'=>$username]);
    		return redirect('admin');
    	}
    }

    public function logout(){
    	session()->forget('userAdmin');
    	return redirect('admin');
    }

    public function productEdit($id){
    	$product = Product::find($id);
    	$brands = Brand::all();
        $this->data['product'] = $product ?? [];
        $this->data['brands'] = $brands ?? [];
        $this->data['title'] = 'Chỉnh sửa thông tin';
    	return view('admin.product.productEdit',$this->data);
    }

    public function productAdd(){
        $brands = Brand::all();
        $this->data['brands'] = $brands ?? [];
        $this->data['title'] = 'Thêm sản phẩm';
        return view('admin.product.productAdd',$this->data);
    }

     public function productDelete($id){

        Product::where('id',$id)->delete();
        return redirect()->back();
    }

    public function postProductEdit($id, Request $request)
    {

        $product=Product::find($id);
        $hangId=$request->hangId;
        $productName=$request->productName;
        $productPrice=$request->productPrice;
        $productDescription=$request->productDescription;
        $productImage=$request->file('productImage');
         if($productImage!=null){
            $image=$productImage->getClientOriginalName();
            $productImage->move('img/products',$image);
        }else{
            $image=$product->productImage;
        }

        Product::where('id',$id)->update([

            'hangId'=>$hangId,
            'productName'=>$productName,
            'productPrice'=>$productPrice,
            'productDescription'=>$productDescription,
            'productImage'=>$image

        ]);

        return redirect()->back();

    }

      public function postProductAdd(Request $request)
    {

        $hangId=$request->hangId;
        $productName=$request->productName;
        $productPrice=$request->productPrice;
        $productDescription=$request->productDescription;
        $productImage=$request->file('productImage');

        if($productImage!=null){
            $image=$productImage->getClientOriginalName();
            $productImage->move('img/products',$image);
        }else{
            $image=$product->productImage;
        }

        Product::insert([

            'hangId'=>$hangId,
            'productName'=>$productName,
            'productPrice'=>$productPrice,
            'productDescription'=>$productDescription,
            'productImage'=>$image

        ]);
        
        return redirect('admin/products');

    }
    public function members(){
        $members = Member::all();
        $this->data['members'] = $members ?? [];
        $this->data['title'] = 'Danh sách thành viên';
        return view('admin.member.memberShow',$this->data);
    }

    public function memberDelete($id){

        Member::where('id',$id)->delete();
        return redirect()->back();
    }

    public function news(){
        $news = News::all();
        $this->data['news'] = $news ?? [];
        $this->data['title'] = 'Danh sách bài viết';
        return view('admin.news.newShow',$this->data);
    }

    public function newEdit($id){
        $new = News::find($id);
        $this->data['new'] = $new ?? [];
        $this->data['title'] = 'Chỉnh sửa thông tin';
        return view('admin.news.newEdit',$this->data);
    }

    
    public function newAdd(){
    
        $this->data['title'] = 'Thêm bài viết';
        return view('admin.news.newAdd',$this->data);
    }

    public function newDelete($id){

        News::where('id',$id)->delete();
        return redirect()->back();
    }

    public function postNewEdit($id, Request $request)
    {

        $new=News::find($id);
        $title=$request->title;
        $content=$request->content;
        $imgNew=$request->file('imgNew');

        if($imgNew!=null){
            $image=$imgNew->getClientOriginalName();
            $imgNew->move('img/news',$image);
        }else{
            $image=$new->imgNew;
        }

        News::where('id',$id)->update([

            'title'=>$title,
            'content'=>$content,
            'imgNew'=>$image

        ]);

        return redirect()->back();

    }

    public function postNewAdd(Request $request)
    {

        $title=$request->title;
        $content=$request->content;
        $imgNew=$request->file('imgNew');

        if($imgNew!=null){
            $image=$imgNew->getClientOriginalName();
            $imgNew->move('img/news',$image);
        }else{
            $image=$new->imgNew;
        }

        News::insert([

            'title'=>$title,
            'content'=>$content,
            'imgNew'=>$image

        ]);

        return redirect('admin/news');

    }
}
