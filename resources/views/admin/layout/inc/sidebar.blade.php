  <section class="sidebar">
      <div id="menu" role="navigation">
          <div class="nav_profile">
              <div class="media profile-left">
                  <a class="float-left profile-thumb" href="#">
                      <img src="{{ asset('admin') }}/img/authors/avatar1.jpg" class="rounded-circle"
                          alt="User Image"></a>
                  <div class="content-profile">
                      <h4 class="media-heading">Addison</h4>
                      <ul class="icon-list">

                          <li>
                              <a href="lockscreen.html" title="lock">
                                  <i class="fa fa-fw ti-lock"></i>
                              </a>
                          </li>
                          <li>
                              <a href="edit_user.html" title="settings">
                                  <i class="fa fa-fw ti-settings"></i>
                              </a>
                          </li>

                      </ul>
                  </div>
              </div>
          </div>
          <ul class="navigation">
              <li class="{{ (Route::is('dashboard') ? 'active' : ' ') }}">
                  <a href="{{ URL::to('/dashboard') }}">
                      <i class="menu-icon ti-desktop"></i>
                      <span class="mm-text ">Dashboard</span>
                  </a>
              </li>
              
              <li class="menu-dropdown {{ (Route::is('company.index', 'company.create') ? 'active' : ' ') }}">
                  <a href="#">
                      <i class="ti-user"></i>
                      <span>
                          Company
                      </span>
                      <span class="fa arrow"></span>
                  </a>
                  <ul class="sub-menu">
                      <li class="{{ (Route::is('company.index') ? 'active' : ' ') }}">
                          <a href="{{ route('company.index') }}">
                              <i class="fa fa-fw ti-plug"></i> All Companies
                          </a>
                      </li>
                      <li class="{{ (Route::is('company.create') ? 'active' : ' ') }}">
                          <a href="{{ route('company.create') }}">
                              <i class="ti-new-window"></i> Add Company
                          </a>
                      </li>
                  </ul>
              </li>

              <li class="menu-dropdown {{ (Route::is('department.index', 'department.create') ? 'active' : ' ') }}">
                  <a href="#">
                      <i class="ti-user"></i>
                      <span>
                          Department
                      </span>
                      <span class="fa arrow"></span>
                  </a>
                  <ul class="sub-menu">
                      <li class="{{ (Route::is('department.index') ? 'active' : ' ') }}">
                          <a href="{{ route('department.index') }}">
                              <i class="fa fa-fw ti-plug"></i> All Departments
                          </a>
                      </li>
                      <li class="(Route::is('department.create') ? 'active' : ' ')">
                          <a href="{{ route('department.create') }}">
                              <i class="fa fa-fw ti-plug"></i> Add Department
                          </a>
                      </li>
                  </ul>
              </li>
            
              <li class="menu-dropdown {{ (Route::is('designation.index', 'designation.create') ? 'active' : ' ') }}">
                  <a href="#">
                      <i class="ti-user"></i>
                      <span>
                          Designation
                      </span>
                      <span class="fa arrow"></span>
                  </a>
                  <ul class="sub-menu">
                      <li class="{{ (Route::is('designation.index') ? 'active' : ' ') }}">
                          <a href="{{ route('designation.index') }}">
                              <i class="fa fa-fw ti-plug"></i> All Designations
                          </a>
                      </li>
                      <li class="{{ (Route::is('designation.create') ? 'active' : ' ') }}">
                          <a href="{{ route('designation.create') }}">
                              <i class="ti-new-window"></i> Add Designation
                          </a>
                      </li>
                  </ul>
              </li>

              <li class="menu-dropdown {{ (Route::is('employee.index', 'employee.create') ? 'active' : ' ') }}">
                  <a href="#">
                      <i class="ti-user"></i>
                      <span>
                          Employee
                      </span>
                      <span class="fa arrow"></span>
                  </a>
                  <ul class="sub-menu">
                      <li class="{{ (Route::is('employee.index') ? 'active' : ' ') }}">
                          <a href="{{ route('employee.index') }}" >
                              <i class="fa fa-fw ti-plug"></i> All Employee
                          </a>
                      </li>
                      <li class="{{ (Route::is('employee.create') ? 'active' : ' ') }}">
                          <a href="{{ route('employee.create') }}">
                              <i class="ti-new-window"></i> Add Employee
                          </a>
                      </li>
                  </ul>
              </li>
              
              <li class="menu-dropdown {{ (Route::is('fiscal-year.index', 'fiscal-year.create') ? 'active' : ' ') }}">
                  <a href="#">
                      <i class="ti-user"></i>
                      <span>
                          Fiscal Year
                      </span>
                      <span class="fa arrow"></span>
                  </a>
                  <ul class="sub-menu">
                      <li class="{{ (Route::is('fiscal-year.index') ? 'active' : ' ') }}">
                          <a href="{{ route('fiscal-year.index') }}">
                              <i class="fa fa-fw ti-plug"></i> All Fiscal Years
                          </a>
                      </li>
                      <li class="{{ (Route::is('fiscal-year.create') ? 'active' : ' ') }}">
                          <a href="{{ route('fiscal-year.create') }}">
                              <i class=" ti-new-window "></i> Add Fiscal Year
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="menu-dropdown {{ (Route::is('leave-category.index', 'leave-category.create') ? 'active' : ' ') }}">
                  <a href="#">
                      <i class="ti-user"></i>
                      <span>
                          Leave Category
                      </span>
                      <span class="fa arrow"></span>
                  </a>
                  <ul class="sub-menu">
                      <li class="{{ (Route::is('leave-category.index') ? 'active' : ' ') }}">
                          <a href="{{ route('leave-category.index') }}">
                              <i class="fa fa-fw ti-plug"></i> All Leave Categorys
                          </a>
                      </li>
                      <li class="{{ (Route::is('leave-category.create') ? 'active' : ' ') }}">
                          <a href="{{ route('leave-category.create') }}">
                              <i class=" ti-new-window "></i> Add Leave Category
                          </a>
                      </li>
                  </ul>    
             </li>
             <li class="menu-dropdown {{ (Route::is('leave-application.index', 'leave-application.create') ? 'active' : ' ') }}">
                  <a href="#">
                      <i class="ti-user"></i>
                      <span>
                          Leave Application
                      </span>
                      <span class="fa arrow"></span>
                  </a>
                  <ul class="sub-menu">
                      <li class="{{ (Route::is('leave-application.index') ? 'active' : ' ') }}">
                          <a href="{{ route('leave-application.index') }}">
                              <i class="fa fa-fw ti-plug"></i> All Leave Applications
                          </a>
                      </li>
                      <li class="{{ (Route::is('leave-application.create') ? 'active' : ' ') }}">
                          <a href="{{ route('leave-application.create') }}">
                              <i class=" ti-new-window "></i> Add Leave Application
                          </a>
                      </li>
                  </ul>    
             </li>
          </ul>
               
          <!-- / .navigation -->
      </div>
      <!-- menu -->
  </section>
