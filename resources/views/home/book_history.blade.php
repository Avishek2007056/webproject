<!DOCTYPE html>
<html lang="en">

<head>

    @include('home.css')
    <style type="text/css">

        .table_deg {
            border: 1px solid white;
            margin: auto;
            text-align: center;
            margin-top: 100px;
        }

        th {
            background-color: skyblue;
            color: white;
            font-weight: bold;
            font-size: 18px;
            padding: 10px;
        }

        td {
            color: white;
            background-color: black;
            border: 1px solid white;
        }

        .book_img {
            height: 120px;
            width: 80px;
            margin: auto;
        }

        .order_value {
            text-align: center;
            margin-bottom: 70px;
            padding: 18px;
        }

    </style>

</head>

<body>

    @include('home.header')

    <div class="currently-market">
        <div class="container">
            <div class="row">

                @if(session()->has('message'))
                <div style="margin-top: 100px;" class="alert alert-success">
                    {{session()->get('message')}}
                    <button type="button" class="close" aria-hidden="true" data-bs-dismiss="alert">x</button>
                </div>
                @endif

                <table class="table_deg">
                    <tr>
                        <th>Book Name</th>
                        <th>Book Author</th>
                        <th>Price</th>
                        <th>Order Status</th>
                        <th>Book Image</th>
                        <th>Cancel Order Request</th>
                    </tr>

                    <?php $value = 0; ?>

                    @foreach($data as $data)

                    <tr>
                        <td>{{$data->book->title}}</td>
                        <td>{{$data->book->author_name}}</td>
                        <td>{{$data->book->price}}</td>
                        <td>{{$data->status}}</td>
                        <td>
                            <img class="book_img" src="book/{{$data->book->book_img}}">
                        </td>
                        <td>
                            @if($data->status == 'Applied')
                            <a href="{{url('cancel_req',$data->id)}}" class="btn btn-warning">Cancel Order</a>
                            @else
                            <p style="color: white; font-weight: bold;">Cannot cancel Order Request</p>
                            @endif
                        </td>
                    </tr>

                    <?php
                    if ($data->status == 'accepted' && is_numeric($data->book->price)) {
                        $value += $data->book->price;
                    }
                    ?>

                    @endforeach

                </table>

            </div>

            <div class="order_value">
                <button id="codButton" class="btn btn-primary" onclick="showTotalPrice()" style="border-radius: 50px;">Cash on Delivery</button>

                <h3 id="totalPrice" style="display: none;">Total Price is : {{$value}} tk</h3>
            </div>
            <a href="{{url('stripe',$value)}}" class="btn btn-danger">Pay Using Card</a>

        </div>
    </div>

    @include('home.footer')

    <script type="text/javascript">
        function showTotalPrice() {
            document.getElementById('codButton').style.display = 'none';
            document.getElementById('totalPrice').style.display = 'block';
        }
    </script>

</body>

</html>
