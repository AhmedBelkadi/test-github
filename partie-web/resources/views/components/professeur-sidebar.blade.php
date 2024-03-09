<!-- sideBar -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme ">
    <div style="height: 24%;width: 100%" class="  ">
        <a href="{{route("indexProf")}}" class="   h-100">
              <span class=" h-100 w-100 d-flex align-items-center justify-content-center">
                    <img class="w-75 h-75 border rounded-3" src="{{asset("assets/img/avatars/wwww.jpg")}}">
              </span>
        </a>
    </div>


    <ul style="height: 78%" class="  menu-inner d-flex pt-5 gap-1 align-items-center  ">
        <!-- Dashboard -->
        <li class="menu-item @yield("prof-dashboard-active") ">
            <a href="{{route("indexProf")}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-item @yield("classrooms-active")">
            <a href="{{route("classrooms.index")}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layer"></i>
                <div data-i18n="Analytics">ClassRooms</div>
            </a>
        </li>

    </ul>
</aside>
<!-- / sideBar -->


{{--    <div class="menu-inner-shadow"></div>--}}
