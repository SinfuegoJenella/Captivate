<section class="nav-side-menu" style="">
    <div class="brand">
        <img src="{{asset('images/logooo2.png')}}" width="130px"/>
    </div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
        <ul id="menu-content" class="menu-content collapse out">
            <li class="">
              <a href="/">
              <i class="fa fa-dashboard fa-lg"></i> Dashboard
              </a>
            </li>

            <li class="">
              <a href="/users" class="">
              <i class="fa fa-user-o fa-lg"></i> Employees
              </a>
            </li>

            <li data-toggle="collapse" data-target="#boardsList" class="collapsed">
              <a><i class="fa fa-trello fa-lg"></i> Boards <span class="arrow"></span></a>
            </li>  

              <ul class="sub-menu collapse" id="boardsList">
                <li data-toggle="collapse" data-target="#activeProj" class="collapsed">Web Projects</li>
                  {{-- <ul class="sub-menu collapse projList" id="activeProj">
                      <li data-toggle="collapse" data-target="#service" class="collapsed pl-10">
                        [K] Kanban Board1
                      </li>
                      <li data-toggle="collapse" data-target="#service" class="collapsed pl-10">
                        [S] Scrum Board1
                      </li>
                  </ul> --}}
                <li data-toggle="collapse" data-target="#" class="collapsed">My Board</li>
                <li data-toggle="collapse" data-target="#" class="collapsed">Creatives Team</li>
              </ul>
            
              <li data-toggle="collapse" data-target="#brandsList" class="collapsed">
                <a><i class="fa fa-suitcase fa-lg"></i> Brands <span class="arrow"></span></a>
              </li>  

              <ul class="sub-menu collapse" id="brandsList">
                <li data-toggle="collapse" data-target="#" class="collapsed">
                  <a href="/brands">Overview</a></li>
                  <li data-toggle="collapse" data-target="#" class="collapsed">
                      <a href="/brands">Blue Books</a></li>
              </ul>

              <li class="">
                <a href="#">
                <i class="fa fa-align-left fa-lg"></i> Workload
                </a>
              </li>

              <li class="">
                <a href="#">
                <i class="fa fa-commenting-o fa-lg"></i> Messages
                </a>
              </li>

              {{-- <li class="">
                <a href="/">
                <i class="fa fa-dashboard fa-lg"></i> Issues
                </a>
              </li> --}}

              {{-- <li class="">
                <a href="/">
                <i class="fa fa-dashboard fa-lg"></i> Notice Boards
                </a>
              </li>

              <li class="">
                <a href="/">
                <i class="fa fa-dashboard fa-lg"></i> Reports
                </a>
              </li> --}}

              <li class="">
                <a href="/sticky-notes">
                <i class="fa fa-sticky-note-o fa-lg"></i> Sticky Notes
                </a>
              </li>

              <li class="">
                <a href="/">
                <i class="fa fa-gear fa-lg"></i> Settings
                </a>
              </li>

              <li class="">
                <a href="/">
                <i class="fa fa-sign-out fa-lg"></i> Log Out
                </a>
              </li>

              
        </ul>
    </div>
</section>