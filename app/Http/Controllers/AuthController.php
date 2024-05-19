<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Notification;
use App\Notifications\SendEmailNotification;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request){
        // validate data 
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // login code 
        
        if(\Auth::attempt($request->only('email','password'))){

            if(Auth::id())
            {
                $user_type =Auth()->user()->usertype;
                if($user_type == 'admin')
                {
                    $user = User::all()->count();
                    $book = Book::all()->count();
                    $accept = Order::where('status','accepted')->count();
                    $reject = Order::where('status','rejected')->count();



                  return view('admin.index',compact('user','book','accept','reject'));
                }
                else if($user_type == 'user')
                {
                    $data = Book::all();

                
                    return redirect()->route('index');
                }

            }
            else 
            {
                dd($request);
                return redirect()->back()->with('error','abc');
            }

            // $user_type =Auth()->user()->usertype;
            // if($user_type == 'admin')
            // {
            //     return view('admin.index');
            // }
            // else if($user_type == 'user')
            // {
            //     return view('home.index');
            // }
            //  return redirect('home');
        }

        return redirect('login')->withError('Login details are not valid');

    }

    public function register_view()
    {
        return view('auth.register');
    }

    public function register(Request $request){
        // validate 
        $request->validate([
            'name'=>'required',
            'email' => 'required|unique:users|email',
            'password'=>'required|confirmed',
            'usertype' => 'required',
        ]);

        // save in users table 
        
        // User::create([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'password'=> \Hash::make($request->password), 
        //     //'usertype' => $request->usertype,
        // ]);
            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=\Hash::make($request->password);
            $user->usertype='user';
            $user->save();

        // login user here 
        
        if(\Auth::attempt($request->only('email','password'))){
            return redirect()->route('index');
        }

        return redirect('register')->withError('Error');


    }



    public function home(){
        return view('auth.login');
    }

     public function logout(){
        \Session::flush();
        \Auth::logout();
        return redirect('');
    }



    public function category_page()
    {
        $data = Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new Category;
        $data->cat_title = $request->category;
        $data->save();
        return redirect()->back()->with('message','Category Added Successfully');


    }

    public function cat_delete($id)
    {
        $data= Category::find($id);
        $data->delete();
        return redirect()->back()->with('message','category deleted successfully');
    }
    public function edit_category($id)
    {
        $data= Category::find($id);

        return view('admin.edit_category',compact('data'));
    }


    public function update_category(Request $request,$id)
    {
        $data = Category::find($id);
        $data->cat_title = $request->cat_name;
        $data->save();
        return redirect('/category_page')->with('message','Category Updated Successfully');
    }

    public function add_book()
    {
        $data = Category::all();

        return view('admin.add_book',compact('data'));
    }

    public function store_book(Request $request)
    {
        $data = new Book;
        $data->title = $request->book_name;
        $data->author_name = $request->author_name;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->description = $request->description;
        $data->category_id = $request->category;

        $book_image = $request->book_img;

        if($book_image)
        {
            $book_image_name = time() . '.' . $book_image->getClientOriginalExtension();

            $request->book_img->move('book',$book_image_name);
            $data->book_img = $book_image_name;
        }



        $data->save();
        return redirect()->back()->with('message','Book Added Successfully');
    }

    public function show_book()
    {
        $book = Book::all();

        return view('admin.show_book',compact('book'));
    }

    public function book_delete($id)
    {
        $data = Book::find($id);
        $data->delete();
        return redirect()->back()->with('message','Book Deleted Successfully');
    }

    public function edit_book($id)
    {
        $data = Book::find($id);
        $category = Category::all();
        return view('admin.edit_book',compact('data','category'));
    }

    public function update_book(Request $request,$id)
    {
        $data = Book::find($id);
        $data->title = $request->title;
        $data->author_name = $request->author_name;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->description = $request->description;
        $data->category_id = $request->category;


        $book_image = $request->book_img;

        if($book_image)
        {
            $book_image_name = time() . '.' . $book_image->getClientOriginalExtension();

            $request->book_img->move('book',$book_image_name);
            $data->book_img = $book_image_name;
        }

        $data->save();
        return redirect('/show_book')->with('message','Book Updated Succcessfully');
        
    }

    public function order_request()
    {

        $data = Order::paginate(4);
        return view('admin.order_request',compact('data'));

    }

    public function accept_book($id)
    {
        $data = Order::find($id);
        $status = $data->status;

        if($status == 'accepted')
        {
            return redirect()->back();
        }
        else 
        {

            $data->status = 'accepted';
            $data->save();

            $bookid = $data->book_id;
            $book = Book::find($bookid);
            $book_qty = $book->quantity - '1';
            $book->quantity = $book_qty;
            $book->save();


            return redirect()->back();

        }

        
    }

    public function rejected_book($id)
    {
        $data = Order::find($id);
        $data->status = 'rejected';
        $data->save();
        return redirect()->back();
    }

    public function send_email($id)
    {
        $order = order::find($id);
        return view('admin.email_info',compact('order'));
    }

    public function send_user_email(Request $request , $id)
    {
        $order = order::find($id);

        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,


        ];

        Notification::send($order,new SendEmailNotification($details));
        return redirect()->back()->with('message','Email Sent is Successfull');
    }

    
}
