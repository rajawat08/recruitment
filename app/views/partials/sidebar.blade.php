
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a class="active" href="{{url('/')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Users</span>
                      </a>
                      <ul class="sub">
                          <li>{{HTML::link("/users", 'All users');}}</li>
                           <li>{{HTML::link("/users/create", 'Add New')}}</li>
                          <li>{{HTML::link("/roles", 'Roles')}}</li>
                          <li>{{HTML::link("/permissions", 'Permissions')}}</li>
                      </ul>
                  </li>
              </ul>
             
          </div>
      </aside>
  