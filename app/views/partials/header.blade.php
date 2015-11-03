<!--header start-->
          <header class="header white-bg">
              <div class="container ">

              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="fa fa-bar"></span>
                  <span class="fa fa-bar"></span>
                  <span class="fa fa-bar"></span>
              </button>
                  <!--logo start-->
                  <a href="index.html" class="logo" >Flat<span>CRM</span></a>
                  <!--logo end-->
                  <div class="horizontal-menu navbar-collapse collapse ">
                  <ul class="nav navbar-nav">
                      <li><a href="index.html">Dashboard</a></li>
                      <li class="active"><a href="#">Contacts</a></li>
                      <li ><a href="#">Accounts</a></li>
                      <li ><a href="#">Openings</a></li>
                      <li ><a href="#">Candidates</a></li>
                      
                      <li class="dropdown">
                          <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">Users<b class=" fa fa-angle-down"></b></a>
                          <ul class="dropdown-menu">
                            <li>{{HTML::link("/users", 'All users');}}</li>
                              <li><a href="users">All users</a></li>
                              <li><a href="#">Add New</a></li>
                              <li><a href="#">Roles</a></li>
                              <li><a href="#">Permissions</a></li>
                              
                          </ul>
                      </li>
                      
                  </ul>

              </div>
                  <div class="top-nav ">
                      <ul class="nav pull-right top-menu">
                          <li>
                              <input type="text" class="form-control search" placeholder="Search">
                          </li>
                          <!-- user login dropdown start-->
                          <li class="dropdown">
                              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                  
                                  {{HTML::image("img/avatar1_small.jpg")}}
                                  <span class="username">Jhon Doue</span>
                                  <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu extended logout">
                                  <div class="log-arrow-up"></div>
                                  <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                                  <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                                  <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                                  <li><a href="login.html"><i class="fa fa-key"></i> Log Out</a></li>
                              </ul>
                          </li>
                          <!-- user login dropdown end -->
                      </ul>
                  </div>
              </div>
          </header>
          <!--header end-->