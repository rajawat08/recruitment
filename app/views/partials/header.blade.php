
          <header class="header white-bg">
            <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" ></div>
              </div>
            
            <a href="index.html" class="logo">Flat<span>CRM</span></a>
          
            <div class="nav notify-row" id="top_menu">
             
            </div>
             <div class="top-nav ">
                      <ul class="nav pull-right top-menu">
                          <li>
                              <input type="text" class="form-control search" placeholder="Search">
                          </li>
                          
                          <li class="dropdown">
                              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                  
                                  {{HTML::image("img/avatar1_small.jpg")}}
                                  <span class="username">{{Auth::user()->name}}</span>
                                  <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu extended logout">
                                  <div class="log-arrow-up"></div>
                                 <!--  <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                                  <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                                  <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li> -->
                                  <li><a href="{{url('/logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
                              </ul>
                          </li>
                         
                      </ul>
                  </div>

          </header>
       