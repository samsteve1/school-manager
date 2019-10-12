<!--Admin Linksu-->
<li class="header">
        ADMINISTRATIVE TASKS
</li>
     <li class="">
         <a href="{{ route('admin.class.create') }}">
             <i class="fa fa-plus"></i>
             <Span>Add a class</Span>
         </a>
     </li>
     <li class="">
        <a href="">
            <i class="fa fa-eye"></i>
            <span>View Classes</span>
        </a>
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
