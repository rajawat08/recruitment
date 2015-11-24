
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a  class="{{ Request::is('/')  ? 'active' : '' }}" href="{{url('/')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="{{ Request::is('users') || Request::is('users/*') || Request::is('roles') || Request::is('roles/*')  ? 'active' : '' }}" href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Users</span>
                      </a>
                      <ul class="sub">
                          <li class="{{ Request::is('users') || Request::is('users/*')  ? 'active' : '' }}" >{{HTML::link("/users", 'All users');}}</li>                           
                          <li class="{{ Request::is('roles') || Request::is('roles/*')  ? 'active' : '' }}">{{HTML::link("/roles", 'Roles')}}</li>
                          <li class="{{ Request::is('permissions') || Request::is('permissions/*')  ? 'active' : '' }}">{{HTML::link("/permissions", 'Permissions')}}</li>
                      </ul>
                  </li>
                  <li>
                      <a class="{{ Request::is('clients') || Request::is('clients/*')  ? 'active' : '' }}" href="{{url('/clients')}}">
                          <i class="fa fa-users"></i>
                          <span>Accounts</span>
                      </a>
                  </li>

                   <li>
                      <a class="{{ Request::is('contacts') || Request::is('contacts/*')  ? 'active' : '' }}"  href="{{url('/contacts')}}">
                          <i class="fa fa-phone"></i>
                          <span>Contacts</span>
                      </a>
                  </li>
                   <li>
                      <a class="{{ Request::is('leads') || Request::is('leads/*')  ? 'active' : '' }}"  href="{{url('/leads')}}">
                          <i class="fa fa-user"></i>
                          <span>Leads</span>
                      </a>
                  </li>


                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Candidates</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-at"></i>
                          <span>Openings</span>
                      </a>
                  </li>


              </ul>
             
          </div>
      </aside>
  