<footer class="footer_sec">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xxl-2 col-lg-3 col-md-4">
          <div class="left_logo">
            <div class="ftr_logo mb-3">
              <a href="{{URL::to('/')}}" class="">
              <img src="{{asset('frontend_assets/assets/images/logo.png')}}" alt="" />
              </a>
            </div>
            <span>Follow us</span>
            <ul>
              <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
              <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
              <li><a href=""><i class="fa-brands fa-youtube"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-xxl-10 col-lg-9 col-md-9">
          <div class="row border_left_btm">
            <div class="col-lg-3 col-md-6">
              <div class="left_aa">
                <h4>POPULAR CATEGORIES</h4>
                @php
                   $category = App\Models\CategoryModel::get();
                @endphp
                <ul>
                  @if($category)
                    @foreach ($category as $val)
                  <li><a href="{{ url('/' . $val->category_slug) }}">{{ $val->category_name }}</a></li>
                    @endforeach
                  @endif
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="left_aa">
                <h4>TRENDING SEARCHES</h4>
                <ul>
                  <li><a href="">Bikes</a></li>
                  <li><a href="">Watches</a></li>
                  <li><a href="">Books</a></li>
                  <li><a href="">Dogs</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="left_aa">
                <h4>ABOUT US</h4>
                <ul>
                  <li><a href="">About Dubizzle Group</a></li>
                  <li><a href="">Rent Hub Blog</a></li>
                  <li><a href="">Contact Us</a></li>
                  <li><a href="">Rent Hub for Businesses</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="left_aa">
                <h4>quick links</h4>
                <ul>
                  <li><a href="">Help</a></li>
                  <li><a href="">Sitemap</a></li>
                  <li><a href="{{URL::to('disclaimer')}}">Disclaimer</a></li>
                  <li><a href="{{URL::to('privacy-policy')}}">Privacy Policy</a></li>
                </ul>
              </div>
            </div>
          </div>
          <p class="copy_right">Copyright © {{ date('Y') }}. All rights reserved. designed & developed by <a href="">Excellis
              IT.</a></p>
        </div>
      </div>
    </div>
  </footer>
