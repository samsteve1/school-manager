<aside class="main-sidebar">


        <section class="sidebar">
                <div class="user-panel">
                        <div class="pull-left image">
                          <img src="{{ auth()->user()->avatar }}" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                          <p>{{ auth()->user()->fullName() }}</p>
                          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                      </div>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="
        search
      ">
      <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat">
              <i class="fas fa-search"></i>
            </button>
          </span>
    </div>
  </form>

<li class="header">ACCOUNT</li>
<li class="">
    <a href="{{ route('account.profile') }}">
        <i class="fas fa-fw fa-user "></i>
        <span>
            Profile
        </span>

                </a>
        </li>
<li class="">
    <a href="{{ route('account.password') }}"
               >
        <i class="fas fa-fw fa-lock "></i>
        <span>
            Change Password
        </span>

     </a>
    </li>
    <!--if the authenticated user  is an admin, include the admin links -->
    @admin
        @include('admin.partials.sidebar._sidebar')
    @endadmin


</ul>

    <!-- /.sidebar-menu -->


              <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
