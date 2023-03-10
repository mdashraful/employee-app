 <header class="header">
     <nav class="navbar navbar-static-top" role="navigation">
         <a href="index.html" class="logo">
             <!-- Add the class icon to your logo image or logo icon to add the marginin -->
             <img src="{{ asset('admin') }}/img/logo_white.png" alt="logo" />
         </a>
         <!-- Header Navbar: style can be found in header-->
         <!-- Sidebar toggle button-->
         <div class="mr-auto">
             <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                     class="fa fa-fw ti-menu"></i>
             </a>
         </div>
         <div class="navbar-right">
             <ul class="nav navbar-nav">
                @auth
                 <li class="dropdown user user-menu">
                     <a href="#" class="dropdown-toggle padding-user d-block" data-toggle="dropdown">
                         <img src="{{ asset('admin') }}/img/authors/avatar1.jpg" width="35"
                             class="rounded-circle img-fluid float-left" height="35" alt="User Image">
                         <div class="riot">
                             <div>
                                 {{ Auth::user()->name }}
                                 <span><i class="fa fa-sort-down"></i></span>
                             </div>
                         </div>
                     </a>
                     <ul class="dropdown-menu">
                         <!-- User image -->
                         <li class="user-header">
                             <img src="{{ asset('admin') }}/img/authors/avatar1.jpg" class="rounded-circle"
                                 alt="User Image">
                             <p>{{ Auth::user()->name }}</p>
                         </li>
                         <!-- Menu Body -->
                         <li role="presentation"></li>
                         <li><a href="change_password.html" class="dropdown-item"><i class="fa fa-fw ti-settings"></i>
                                 Change Password </a></li>
                         <li role="presentation" class="dropdown-divider"></li>
                         <!-- Menu Footer-->
                         <li class="user-footer">
                             <div class="float-left">
                                 <a href="lockscreen.html">
                                     <i class="fa fa-fw ti-lock"></i>
                                     Lock
                                 </a>
                             </div>
                             <div class="float-right">
                                 <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                     <i class="fa fa-fw ti-shift-right"></i>
                                     Logout
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                 </form>
                             </div>
                         </li>
                     </ul>
                 </li>
                 @endauth
             </ul>
         </div>
     </nav>
 </header>
