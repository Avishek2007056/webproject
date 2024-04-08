<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {

        $data = Book::all();

        return view('home.index',compact('data'));
    }

    public function book_details($id)
    {
        $data = Book::find($id);
        return view('home.book_details',compact('data'));
    }



    public function order_books($id)
    {
        $data = Book::find($id);
        $book_id = $id;
        $quantity = $data->quantity;
        
        if($quantity>='1')
        {
            if(Auth::id())
            {
                $user_id = Auth::user()->id;
                $order = new Order;
                $order->book_id = $book_id;
                $order->user_id = $user_id;

                $order->status = 'Applied';
                $order->save();

                return redirect()->back()->with('message','A request is sent to the owner to order this book' );


            }
            else 
            {
                return redirect('/login');
            }
                

        }
        else 
        {
            return redirect()->back()->with('message','Can not Order' );

        }

    }

    public function book_history()
    {

        if(Auth::id())
        {
            $userid = Auth::user()->id;
            $data = Order::where('user_id','=',$userid)->get();

            return view('home.book_history',compact('data'));
        }


    }

    public function cancel_req($id)
    {
        $data = Order::find($id);
        $data->delete();
        return redirect()->back()->with('message','Order Request Canceled');
    }

    public function explore()
    {
        $category = Category::all();

        $data = Book::all();
        return view('home.explore',compact('data','category'));
    }

    public function search(Request $request)
    {
        $category = Category::all();
        $search = $request->search;
        $data = Book::where('title','LIKE','%'.$search.'%')->orwhere('author_name','LIKE','%'.$search.'%')->get();

        return view('home.explore',compact('data','category'));
        
    }

    public function cat_search($id)
    {
        $category = Category::all();
        $data = Book::where('category_id',$id)->get();
        return view('home.explore',compact('data','category'));

    }



}
