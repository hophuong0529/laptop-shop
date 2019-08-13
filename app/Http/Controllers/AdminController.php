<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Admin;
use App\Product;
use App\Brand;
use App\Orderdetail;
use App\Order;
use App\Member;
use App\News;
use App\Feedback;


class AdminController extends Controller
{
    public function index(){

        if(!session('userAdmin')){
            return view('admin.login');     
            
        }else{
            $products=DB::table('brands as a')->join('products as b','a.id','b.brandId')->get();
            $orderDetails=OrderDetail::select('productId')->get();
            $this->data['products'] = $products ?? [];
            $this->data['orderDetails'] = $orderDetails ?? [];
            $this->data['title'] = 'Danh sách sản phẩm';
            return view('admin.product.productShow',$this->data);
        }
    }

    public function postLoginAdmin(Request $request){

        $username=$request->username;
        $password=md5($request->password);
        $messages = [
            'username.required' => 'Tên đăng nhập không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự',
        ];

        Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|min:6',
        ], $messages)->validate();

        $admin=Admin::where('username',$username)->where('password',$password)->get();
        if(count($admin)==0){
            return redirect()->back()->with('alert','Sai tên đăng nhập hoặc mật khẩu');
        }else{
            session(['userAdmin'=>$username]);
            return redirect('admin');
        }
    }

    public function logout(){
        session()->forget('userAdmin');
        return redirect('admin');
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
        return redirect()->back()->with('message','Cập nhật tiến độ đơn hàng thành công !');;
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

    public function postProductEdit($id, Request $request){

        $product=Product::find($id);
        $brandId=$request->brandId;
        $productName=$request->productName;
        $productPrice=$request->productPrice;
        $productDescription=$request->productDescription;
        $status=$request->status;
        $productImage=$request->file('productImage');

        $messages = [
            'productName.required' => 'Tên sản phẩm không được để trống ',
            'productPrice.required' => 'Giá sản phẩm không được để trống',
            'productPrice.numeric' => 'Giá sản phẩm không đúng. Vui lòng nhập lại',
        ];

        Validator::make($request->all(), [
            'productName' => 'required',
            'productPrice' => 'required|numeric',
        ], $messages)->validate();


        if($productImage!=null){
            $image=$productImage->getClientOriginalName();
            $productImage->move('img/products',$image);

        }else{
            $image=$product->productImage;
        }

        Product::where('id',$id)->update([

            'brandId'=>$brandId,
            'productName'=>$productName,
            'productPrice'=>$productPrice,
            'productDescription'=>$productDescription,
            'productImage'=>$image,
            'status'=>$status

        ]);

        return redirect()->back()->with('message','Cập nhật thông tin sản phẩm thành công !');;

    }

    public function postProductAdd(Request $request){

        $brandId=$request->brandId;
        $productName=$request->productName;
        $productPrice=$request->productPrice;
        $productDescription=$request->productDescription;
        $status=$request->status; 
        $productImage=$request->file('productImage');

        $messages = [
            'brandId.required' => 'Vui lòng chọn hãng cho sản phẩm.',
            'productName.required' => 'Tên sản phẩm không được để trống. ',
            'productName.unique' => 'Tên sản phẩm đã có. Vui lòng nhập lại. ',
            'productPrice.required' => 'Giá sản phẩm không được để trống.',
            'productPrice.numeric' => 'Giá sản phẩm không đúng. Vui lòng nhập lại.',
            'status.required' => 'Vui lòng chọn trạng thái cho sản phẩm.',
            'productImage.required' => 'Vui lòng chọn hình ảnh cho sản phẩm.'
        ];

        Validator::make($request->all(), [
            'brandId' => 'required',
            'productName' => 'required|unique:products',
            'productPrice' => 'required|numeric',
            'status' => 'required',
            'productImage' => 'required'
        ], $messages)->validate();

        $image=$productImage->getClientOriginalName();
        $productImage->move('img/products',$image);

        Product::insert([

            'brandId'=>$brandId,
            'productName'=>$productName,
            'productPrice'=>$productPrice,
            'productDescription'=>$productDescription,
            'productImage'=>$image,
            'status'=>$status

        ]);

        echo "<script>alert('Thêm sản phẩm thành công !'); location='products'</script>";

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

    public function postNewEdit($id, Request $request){

        $new=News::find($id);
        $title=$request->title;
        $content=$request->content;
        $imgNew=$request->file('imgNew');

        $messages = [
            'title.required' => 'Tiêu đề không được để trống',
            'content.required' => 'Nội dung không được để trống',
        ];

        Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required'
        ], $messages)->validate();

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

        return redirect()->back()->with('message','Cập nhật bài viết thành công !');
    }

    public function postNewAdd(Request $request){

        $title=$request->title;
        $content=$request->content;
        $imgNew=$request->file('imgNew');

        $messages = [
            'title.required' => 'Tiêu đề không được để trống',
            'content.required' => 'Nội dung không được để trống',
            'imgNew' => 'Vui lòng chọn hình ảnh cho bài viết'
        ];

        Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'imgNew' => 'required'
        ], $messages)->validate();
        
        $image=$imgNew->getClientOriginalName();
        $imgNew->move('img/news',$image);

        News::insert([

            'title'=>$title,
            'content'=>$content,
            'imgNew'=>$image

        ]);

        echo "<script>alert('Thêm bài viết thành công !'); location='news'</script>";

    }

    public function feedbacks(){

        $feedbacks = Feedback::all();
        $this->data['feedbacks'] = $feedbacks ?? [];
        $this->data['title'] = 'Danh sách phản hồi';
        return view('admin.feedbacks.feedbackShow',$this->data);
    }

    public function feedbackReply($id){

        $feedback = Feedback::find($id);
        $this->data['feedback'] = $feedback ?? [];
        $this->data['title'] = 'Chỉnh sửa thông tin';
        return view('admin.feedbacks.feedbackReply',$this->data);
    }

    public function postFeedbackReply($id,Request $request){

        $new=Feedback::find($id);
        $reply=$request->reply;

        $messages = [
            'reply.required' => 'Bạn chưa trả lời khách hàng. Vui lòng nhập lại',
        ];

        Validator::make($request->all(), [
            'reply' => 'required'
        ], $messages)->validate();
        
        Feedback::where('id',$id)->update([
            'reply' => $reply,
            'status' => 1
        ]);

        return redirect()->to('admin/feedbacks')->with('message','Trả lời thành công. Tin nhắn đã được gửi đến khách hàng !');

    }

    public function feedbackDelete($id){

        Feedback::where('id',$id)->delete();
        return redirect()->back();
    }


}
