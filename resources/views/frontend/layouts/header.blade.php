  <!-- Top navigation -->
  <div class="top-nav">
      <div class="brand-logo">
          <a href="{{url('/')}}" class="brand">Metty<span>hair</span></a>
      </div>
      <div class="search-box">
          <input type="text" class="search-input" placeholder="Search here..." />
          <input type="submit" class="btn-search" value="Search" />
      </div>
      <div class="action-btns">
          <span class="search-icon"><i class="fas fa-search"></i></span>
          <div class="cart-logo">
              <a href="{{route('shopping.cart')}}"><i class="fas fa-shopping-cart"></i><span class="text"> - <strong class="cart-qty text">0</strong> items</span></a>
          </div>
          <div class="user-logo">
              <span><i class="fas fa-user"></i><span class="arrow"><i class="fas fa-angle-down"></i></span></span>
              <ul class="auth-dropdown">
                  @auth
                  <li>
                      <a href="{{route('dashboard')}}"><i class="fas fa-user"></i>Profile</a>
                  </li>
                  <li>
                      <a href="{{route('user.logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                  </li>
                  @else
                  <li>
                      <a href="{{route('login')}}"><i class="fas fa-lock"></i>Login</a>
                  </li>
                  <li>
                      <a href="{{route('register')}}"><i class="fas fa-pencil-alt"></i> Register</a>
                  </li>
                  @endauth
              </ul>
          </div>
      </div>
  </div>
  <!-- Page navigation -->
  <div class="container">
      <div class="page-nav">
          <nav class="nav-holder">
              <div class="menu-toggle">
                  <h2 class="menu">Menu</h2>
                  <span class="toggle"><i class="fas fa-bars"></i></span>
              </div>
              <ul class="nav-list">
                  <li class="nav-link active-link">
                      <a class="link" href="{{url('/')}}">Home</a>
                  </li>
                  @php
                  $navlists = App\Models\Navlist::orderBy('id', 'ASC')->get();
                  @endphp
                  @foreach($navlists as $navlist)
                  <li class="nav-link">
                      <a class="link mega-menu" href="products.html" data-toggle="nav-link">{{$navlist->navlist_name}} <i class="fas fa-angle-down"></i></a>
                      @php
                      $categories = App\Models\Category::where('navlist_id', $navlist->id)->orderBy('category_name', 'ASC')->get();
                      @endphp
                      <div class="row dropdown">
                          @foreach($categories as $category)
                          <ul class="dropdown-menu">
                              <a href="{{url('/product/category/'.$category->id.'/'.$category->category_slug)}}">
                                  <h4 class="dropdown-menu-text">{{$category->category_name}}</h4>
                              </a>
                              @php
                              $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('id', 'ASC')->get();
                              @endphp
                              @foreach($subcategories as $subcategory)
                              <li><a href="{{url('/product/subcategory/'.$subcategory->id.'/'.$subcategory->subcategory_slug)}}">{{$subcategory->subcategory_name}}</a></li>
                              @endforeach
                          </ul>
                          @endforeach
                      </div>

                  </li>
                  @endforeach
                  </li>
                  <li class="nav-link">
                      <a class="link" href="profile.html">Policy</a>
                  </li>
                  <li class="nav-link">
                      <a class="link" href="home.html">Contact Us</a>
                  </li>
                  <li class="nav-link"><a class="link" href="#">About Us</a></li>
              </ul>
          </nav>
      </div>
  </div>