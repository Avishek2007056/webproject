<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        .center {
            text-align: center;
            margin: auto;
            width: 80%;
            border: 1px solid white;
            margin-top: 40px;
        }
        th {
            background-color: skyblue;
            text-align: center;
            color: white;
            font-size: 15px;
            font-weight: bold;
            padding: 10px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <table class="center">
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Book Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Order Status</th>
                    <th>Book Image</th>
                    <th>Change Status</th>
                    <th>Send Email</th>
                </tr>

                @foreach($data as $order)
                <tr>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->user->email}}</td>
                    <td>{{$order->book->title}}</td>
                    <td>{{$order->book->quantity}}</td>
                    <td>{{$order->book->price}}</td>
                    <td>
                      @if($order->status == 'accepted')
                      <span style="color: green;">{{$order->status}}</span>
                      @elseif($order->status == 'rejected')
                      <span style="color: red;">{{$order->status}}</span>
                      @elseif($order->status == 'Applied')
                      <span style="color: yellow;">{{$order->status}}</span>
                      @endif
                    </td>
                    <td>
                        <img style="height: 150px; width: 110px" src="book/{{$order->book->book_img}}">
                    </td>
                    <td>
                      @if($order->status == 'Applied')
                      <a class="btn btn-warning" href="{{url('accept_book',$order->id)}}">Accept</a>
                      </br>
                      </br>
                      <a class="btn btn-danger" href="{{url('rejected_book',$order->id)}}">Reject</a>
                      @else
                      <span>Status already set</span>
                      @endif
                    </td>
                    <td>
                      <a href="{{url('send_email',$order->id)}}" class="btn btn-info">Send Email</a>
                    </td>
                </tr>
                @endforeach

            </table>
          </div>
        </div>
      </div>

      @include('admin.footer')
  </body>
</html>
