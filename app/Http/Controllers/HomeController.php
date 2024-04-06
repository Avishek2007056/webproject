<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Order;
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









}
