<div class="sidebar" data-color="orange" data-image="/assets/img/sidebar-1.jpg" >
            <div class="logo">
                <a class="simple-text">
                Sistem Perpustakaan <br> Desa
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">

              <li class="{{ Request::is('/') ? 'active' : '' }}">
                    <a href="{{ url('/') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                    </a>
            </li>
                <li class="{{ Request::is('registration') ? 'active' : '' }}">
                    <a href="{{ url('registration') }}">
                     <i class="material-icons">content_paste</i>
                    <p>Register Member</p>
                    </a>
                </li>
                <li class="{{ Request::is('members') ? 'active' : '' }}">
                    <a href="{{ url('members') }}">
                <i class="material-icons">people</i>
                    <p>View Members</p>
                    </a>
                </li>
                <li class="{{ Request::is('books') ? 'active' : '' }}">
                    <a href="{{ url('books') }}">
                    <i class="material-icons">pageview</i>
                    <p>View All Books</p>
                    </a>
                </li>
                <li class="{{ Request::is('issues')||Request::is('issues_not_returned') ? 'active' : '' }}">
                    <a href="{{ url('issues') }}">                        
                    <i class="material-icons">list</i>
                    <p>Borrowing History</p>
                    </a>
                </li>
                <li class="{{ Request::is('categories') ? 'active' : '' }}">
                    <a href="{{ url('categories') }}">                        
             <i class="material-icons">dns</i>
                    <p>Categories</p>
                    </a>
                </li>

                
                    @can('admin-only', auth()->user())
                    <li>
                    <a href="{{ url('/register') }}">                        
                    <i class="material-icons">assignment_ind</i>
                    <p>Register Volunteer</p>
                    </a>
                    </li>
                    @endcan
                
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="material-icons">&#xE879;</i>
                        <p> Logout</p>                       
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    </form>
                </li>
                </ul>
            </div>
        </div>

        