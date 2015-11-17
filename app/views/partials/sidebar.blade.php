
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
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-users"></i>
                          <span>Accounts</span>                         
                      </a>
                      <ul class="sub">
                           <li>{{HTML::link("/clients", 'All Clients');}}</li>
                          <li>{{HTML::link("/clients/create", 'Add New')}}</li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-phone"></i>
                          <span>Contacts</span>
                      </a>
                      <ul class="sub">
                           <li>{{HTML::link("/contacts", 'All Contacts');}}</li>
                          <li>{{HTML::link("/contacts/create", 'Add New')}}</li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
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
  