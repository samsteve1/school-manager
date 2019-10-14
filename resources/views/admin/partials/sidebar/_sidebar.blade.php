<!--Admin Linksu-->
<li class="header">
    <i class="fa fa-graduation-cap"></i>
        CLASSES
</li>
     <li class="">
         <a href="{{ route('admin.class.create') }}">
             <i class="fa fa-plus"></i>
             <Span>Add a class</Span>
         </a>
     </li>
     <li class="">
         <a href="{{ route('admin.student.index') }}">
            <i class="fa fa-user-graduate"></i>
            <span>Students</span>
         </a>
     </li>
     <li class="">
        <a href="{{ route('admin.class.index') }}">
            <i class="fa fa-eye"></i>
            <span>View Classes</span>
        </a>
     </li>

     <li class="header">
            <i class="fa fa-school"></i>
                SESSION & SEMESTER
    </li>

     <li class="">
         <a href="{{ route('admin.class.teacher') }}">
             <i class="fa fa-chalkboard-teacher"></i>
             <span>Assign Teacher</span>
         </a>
     </li>


     <li class="">
        <div class="dropdown sidebar-dropdown">
            <button class="btn dropdown-toggle sidebar-button" type="button" data-toggle="dropdown">
                <i class="fa fa-calendar-alt"></i>  Academic Session
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li class="">
                  <a href="{{ route('admin.session.create') }}">
                      <i class="fa fa-plus"></i>
                      <span>New session</span>
                  </a>
              </li>
              <li class="">
                <a href="{{ route('admin.session.index') }}">
                    <i class="fa fa-eye"></i>
                    <span>View Sessions</span>
                </a>
              </li>

            </ul>
          </div>
      </li>
      <li class="header">
          <i class="fa fa-users"></i>
       STAFF
      </li>
      <li class="">
          <a href="{{ route('admin.staff.create') }}">
              <i class="fa fa-user-plus"></i>
              <span>Add staff</span>
          </a>
      </li>
      <li class="">
        <a href="{{ route('staff.index') }}">
            <i class="fa fa-user-friends"></i>
            <span>All staff</span>
        </a>
    </li>
    <li class="">
        <a href="{{ route('admin.staff.manage') }}">
            <i class="fa fa-users-cog"></i>
            <span>Manage Roles</span>
         </a>
    </li>
    <li class="">
        <a href="{{ route('admin.staff.remove') }}">
            <i class="fa fa-user-plus"></i>
            <span>Remove staff</span>
        </a>
    </li>
