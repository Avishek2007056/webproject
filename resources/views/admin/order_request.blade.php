<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        .center 
        {
            text-align: center;
            margin: auto;
            width: 80%;
            border: 1px solid white;
            margin-top: 40px;
        }
        th 
        {
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
                    <th>Order Status</th>
                    <th>Book Image</th>
                    <th>Change Status</th>
                </tr>

                @foreach($data as $data)

                <tr>
                    <td>{{$data->user->name}}</td>
                    <td>{{$data->user->email}}</td>
                    <td>{{$data->book->title}}</td>
                    <td>{{$data->book->quantity}}</td>
                    <td>
                      @if($data->status == 'accepted')
                      <span style="color: green;">{{$data->status}}</span>
                      @endif

                      @if($data->status == 'rejected')
                      <span style="color: red;">{{$data->status}}</span>
                      @endif

                      @if($data->status == 'Applied')
                      <span style="color: yellow;">{{$data->status}}</span>
                      @endif
                    </td>
                    <td>
                        <img style="height: 150px; width: 110px" src="book/{{$data->book->book_img}}">
                    </td>
                    <td>
                      <a class="btn btn-warning" href="{{url('accept_book',$data->id)}}">Accepted</a>
                      <a class="btn btn-danger" href="{{url('rejected_book',$data->id)}}">Rejected</a>
                      <!-- <a class="btn btn-info" href="">Returned</a> -->
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