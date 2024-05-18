<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner">
    <div class="container">
      <div class="row">


      @if(session()->has('message'))

        <div class="alert alert-success">
          
          {{session()->get('message')}}
          <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">x</button>

        </div>




      @endif


        <div class="col-lg-6 align-self-center">
          <div class="header-text">
            <h6>Book is the Greatest Friend</h6>
            <h2>Welcome To Book Ordering Website !</h2>
            <p>A book ordering website allows users to browse, select, and purchase books online with ease. It provides features like user reviews, detailed book descriptions to enhance the shopping experience.</p>
            <div class="buttons">
              <div class="border-button">
                <a href="{{url('explore')}}">Order Top Rated Books</a>
              </div>
              <div class="border-button">
                <a href="{{url('details')}}">More Book Details</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-1">
          <div class="">
            <!-- <div class="item">
              <img src="assets/images/banner.png" alt="">
            </div> -->
            <!-- <div class="item">
              <img src="assets/images/banner2.png" alt="">
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Main Banner Area End ***** -->
  