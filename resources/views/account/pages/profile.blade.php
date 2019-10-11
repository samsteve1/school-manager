
    @extends('account.layouts.master')

    @section('account_content_sub_header')
        Profile
    @endsection

    @section('account_content_box_title')
        <span class="fa fa-user-circle"></span> Your profile
    @endsection

    @section('account_content_box_body')
        <div class="col-md-6 col-md-offset-3">

          <!-- Profile Image -->
          <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ auth()->user()->avatar }}" alt="User profile picture">

                  <h3 class="profile-username text-center">{{ auth()->user()->fullName() }}</h3>

                  <p class="text-muted text-center">
                      @foreach ($roles as $role)
                        {{ ucwords($role->name) }} {{ $roles[$roles->count() -1 ]->name == $role->name ? '' : ', ' }}
                      @endforeach
                  </p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>e-Mail Address</b> <a class="pull-right">{{ auth()->user()->email }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Gender</b> <a class="pull-right">{{ ucwords(auth()->user()->gender) }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Joined</b> <a class="pull-right">{{ auth()->user()->created_at->format('D, d/M/Y') }}</a>
                    </li>
                  </ul>

                </div>
                <!-- /.box-body -->
              </div>
        </div>
    @endsection

