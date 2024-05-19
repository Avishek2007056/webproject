<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        label 
        {
            display : inline-block;
            width: 200px;
            font-size: 15px;
            font-weight : bold;
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
          <div>
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                       {{session()->get('message')}}

                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    </div>   
                    @endif

                </div>
            <h1 style="text-align : center; font-size : 20px;">Send Email to {{$order->user->email}}</h1>

            <form action="{{url('send_user_email',$order->id)}}" method="POST">
                @csrf
                <!-- <input type="hidden" name="email" value="{{ $order->user->email }}"> -->

            <div style="padding-left : 35%; padding-top : 30px;">
                <label>Email Greeting :</label>
                <input style="color: black;" type="text" name="greeting">
            </div>

            <div style="padding-left : 35%; padding-top : 30px;">
                <label>Email Firstline :</label>
                <input style="color: black;" type="text" name="firstline">
            </div>

            <div style="padding-left : 35%; padding-top : 30px;">
                <label>Email Body :</label>
                <input style="color: black;" type="text" name="body">
            </div>

            <div style="padding-left : 35%; padding-top : 30px;">
                <label>Email Button Name :</label>
                <input style="color: black;" type="text" name="button">
            </div>

            <div style="padding-left : 35%; padding-top : 30px;">
                <label>Email Url :</label>
                <input style="color: black;" type="text" name="url">
            </div>

            <div style="padding-left : 35%; padding-top : 30px;">
                <label>Email Lastline :</label>
                <input style="color: black;" type="text" name="lastline">
            </div>

            <div style="padding-left : 35%; padding-top : 30px;">
                
                <input type="submit" value="Send Email" class="btn btn-primary">
            </div>

            </form>

          </div>
        </div>
      </div>
     
       @include('admin.footer')
  </body>
</html>