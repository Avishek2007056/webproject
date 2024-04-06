<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="/public">

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
            <h2><em>Items</em> Currently In The Market.</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="filters">
            <ul>
              <li data-filter="*"  class="active">All Books</li>
              <li data-filter=".msc">Popular</li>
              <li data-filter=".dig">Latest</li>
              
            </ul>
          </div>
        </div>
        <div class="col-lg-12">
          




           
            <div class="">
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
                  <span class="bid">
                    Current Available<br><strong>{{$data->quantity}}</strong><br> 
                  </span>

                  <p>
                    Category : {{$data->category->cat_title}}
                 </p>



                  <p>
                    Description : {{$data->description}}
                  </p>
                  
                  

                  <!-- <div class="">
                    <a class="btn btn-primary" href="{{url('order_books',$data->id)}}">Order Now</a>
                  </div> -->



                </div>
              </div>
            </div>
           
            

            



            


            


          </div>
        </div>
      </div>
    </div>
  </div>


  
  @include('home.footer')

  

  
  
  </body>
</html>