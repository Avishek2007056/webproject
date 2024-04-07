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
            <h2>Welcome To My Online Book Shop !</h2>
            <p>Library is a really cool and professional design for your websites. This HTML CSS template is based on Bootstrap v5 and it is designed for related web portals. Liberty can be freely downloaded from github</p>
            <div class="buttons">
              <div class="border-button">
                <a href="explore.html">Top Rated Books</a>
              </div>
              <div class="main-button">
                <a href="" target="_blank">More Details</a>
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
  