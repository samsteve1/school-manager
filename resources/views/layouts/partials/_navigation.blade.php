<nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}" class="navbar-brand">
                    {{ config('app.name') }}
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav pull-right">
                    @if(auth()->check())
                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->first_name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="#"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                              <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                              <li role="separator" class="divider"></li>
                              <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <span class="glyphicon glyphicon-log-out"></span>
                                        Logout
                                 </a>

                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     @csrf
                                 </form>
                              </li>
                            </ul>
                    </li>

                    @else
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Enroll</a>
                        </li>
                        <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>

                    @endif

                </ul>
            </div>
        </div>
    </nav>
