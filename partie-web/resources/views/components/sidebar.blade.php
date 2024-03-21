<!-- sideBar -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme " style="border-radius: 0 26px 26px 0" >
    <div style="height: 24%;width: 100%" class="  ">
        @if( \Illuminate\Support\Facades\Auth::user()->role === "professeur" )
        <a href="/professeur" class="   h-100">
              <span class=" h-100 w-100 d-flex align-items-center justify-content-center">
                        <img class="w-75 h-75 border rounded-3" src="{{asset("assets/img/avatars/wwww.jpg")}}">
              </span>
{{--            <span class="app-brand-text demo menu-text fw-bolder ms-2">LOGO</span>--}}
        </a>
        @else
            <a href="/dashboard" class="   h-100">
              <span class=" h-100 w-100 d-flex align-items-center justify-content-center">
                        <img class="w-75 h-75 border rounded-3" src="{{asset("assets/img/avatars/wwww.jpg")}}">
              </span>
{{--            <span class="app-brand-text demo menu-text fw-bolder ms-2">LOGO</span>--}}
        </a>
        @endif

{{--        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">--}}
{{--            <i class="bx bx-chevron-left bx-sm align-middle"></i>--}}
{{--        </a>--}}
    </div>


    <ul style="height: 78%" class="  menu-inner d-flex pt-3 gap-1 align-items-center  ">
        <!-- Dashboard -->


        @if( \Illuminate\Support\Facades\Auth::user()->role === "professeur" )
        <li class="menu-item @yield("prof-dashboard-active") ">
            <a href="{{route("indexProf")}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home"></i>
                <div data-i18n="Analytics">Acceuil</div>
            </a>
        </li>

        <li class="menu-item @yield("classrooms-active")">
            <a href="{{route("classrooms.index")}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layer"></i>
                <div data-i18n="Analytics">ClassRooms</div>
            </a>
        </li>
        @else
            <li class="menu-item @yield("dashboard-active") ">
                <a href="/dashboard" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>
            <li class="menu-item @yield("departements-active")">
                <a href="{{route("departements.index")}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-building"></i>
                    <div data-i18n="Analytics">Departements</div>
                </a>
            </li>
            <li class="menu-item @yield("filieres-active")">
                <a href="{{route("filieres.index")}}" class="menu-link">
                    {{--                <i class="menu-icon tf-icons bx bx-home-circle"></i>--}}
                    <i class="menu-icon tf-icons bx bx-book"></i>
                    <div data-i18n="Analytics">Filieres</div>
                </a>
            </li>
            <li class="menu-item @yield("elements-active")">
                <a href="{{route("elements.index")}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-box"></i>
                    <div data-i18n="Analytics">Elements</div>
                </a>
            </li>
            <li class="menu-item @yield("emplois-active")">
                <a href="{{route("emplois.index")}}"  class="menu-link">
                    <i class="menu-icon tf-icons bx bx-calendar"></i>
                    <div data-i18n="Analytics">Emplois du temps</div>
                </a>
            </li>
            <li class="menu-item @yield("professeurs-active")">
                <a href="{{route("professeurs.index")}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Analytics">Professeurs</div>
                </a>
            </li>
            <li class="menu-item @yield("etudiants-active")">
                <a href="{{route("etudiants.index")}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Analytics">Etudiants</div>
                </a>
            </li>
            <li class="menu-item @yield("modules-active")">
                <a href="{{route("modules.index")}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-layer"></i>
                    <div data-i18n="Analytics">Modules</div>
                </a>
            </li>
        @endif
        <li class="menu-item @yield("absences-active")">
            <a href="{{route("absences.index")}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-x-circle"></i>
                <div data-i18n="Analytics">Absences</div>
            </a>
        </li>
        <li class="menu-item ">
            <hr>
            <a href="{{route("logout")}}" class="menu-link">
                <i class='bx bx-log-out menu-icon tf-icons '  ></i>
                <div data-i18n="Analytics">Logout</div>
            </a>
        </li>
{{--        <li class="menu-item mt-4 ps-5   ">--}}
{{--            <a href="{{route("logout")}}" class="text-white" >--}}
{{--                <i class='bx bx-log-out bx-md '  ></i>--}}
{{--            </a>--}}
{{--        </li>--}}

    </ul>




</aside>
<!-- / sideBar -->


{{--    <div class="menu-inner-shadow"></div>--}}
