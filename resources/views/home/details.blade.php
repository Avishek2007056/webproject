<!DOCTYPE html>
<html lang="en">

  <head>

    @include('home.css')
  </head>

<body>

  @include('home.header')

  <div class="currently-market">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2><em>Book</em> Description and Details</h2>
          </div>
        </div>

        

        <div class="col-lg-6">
          <div class="filters">
            <!-- <ul>
              <li data-filter="*"  class="active">All Books</li>
              <li data-filter=".msc">Popular</li>
              <li data-filter=".dig">Latest</li>
              
            </ul> -->
          </div>
        </div>
        <div class="col-lg-12">
          <div class="row grid">




            @foreach($data as $data)
            <div class="col-lg-6 currently-market-item all msc">
              <div class="item">
                <div class="left-image">
                  <img src="book/{{$data->book_img}}" alt="" style="border-radius: 20px; min-width: 195px;">
                </div>
                <div class="right-content">
                  <h4>{{$data->title}}</h4>
                  <span class="author">
                    <!-- <img src="assets/images/author.jpg" alt="" style="max-width: 50px; border-radius: 50%;"> -->
                    <h6>{{$data->author_name}}</h6>
                  </span>
                  <div class="line-dec"></div>
                  <!-- <span class="bid">
                    Current Available<br><strong>{{$data->quantity}}</strong><br> 
                  </span> -->
                  <br>

                  <!-- <span class="bid">
                    Price<br><strong>{{$data->price}}</strong><br> 
                  </span> -->
                  
                  <div class="text-button">
                    <a href="{{ url('book_details', $data->id) }}" class="btn btn-info" style="color: black; border-radius: 50px;">View Book Details</a>

                  </div>
                  </br>

                  <!-- <div class="">
                    <a class="btn btn-primary" href="{{url('order_books',$data->id)}}">Order Now</a>
                  </div> -->


                </div>
              </div>
            </div>
            @endforeach
            

            



            


            


          </div>
        </div>
      </div>
    </div>
  </div>


 
  @include('home.footer')

  

  
  
  </body>
</html>