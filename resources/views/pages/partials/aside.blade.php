<button class="kt-aside-close " id="kt_aside_close_btn">
    <i class="la la-close"></i>
</button>

<div class="kt-aside  kt-aside--skin-light  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu  kt-aside-menu--skin-light " data-ktmenu-vertical="1" data-ktmenu-scroll="0">
            @if(auth()->user()->is_staff_user())
                <ul class="kt-menu__nav ">
                    <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{route('home')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-icon fa fa-cube"></i>
                            <span class="kt-menu__link-text">
                                Dashboard
                            </span>
                        </a>
                    </li>

                    <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{route('projects.index')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-icon fa fa-cube"></i>
                            <span class="kt-menu__link-text">
                                Projects
                            </span>
                        </a>
                    </li>

                    <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{route('contractors.index')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-icon fa fa-cube"></i>
                            <span class="kt-menu__link-text">
                                Contractor
                            </span>
                        </a>
                    </li>

                    <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="{{ route("user.index") }}" class="kt-menu__link kt-menu__toggle">
                            <i class="kt-menu__link-icon fa fa-dolly"></i>
                                <span class="kt-menu__link-text">
                                    System
                                </span>
                            <i class="kt-menu__ver-arrow la la-angle-right"></i>
                        </a>

                        <div class="kt-menu__submenu ">
                            <span class="kt-menu__arrow"></span>

                            <ul class="kt-menu__subnav">
                                <li class="kt-menu__item " aria-haspopup="true">
                                    <a href="{{ route('role') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-icon fa fa-database">
                                            <span></span>
                                        </i>
                                        <span class="kt-menu__link-text">
                                            Role
                                        </span>
                                    </a>
                                </li>

                                <li class="kt-menu__item " aria-haspopup="true">
                                    <a href="{{route('employees.index')}}" class="kt-menu__link ">
                                        <i class="kt-menu__link-icon fa fa-database">
                                            <span></span>
                                        </i>
                                        <span class="kt-menu__link-text">
                                            Staff
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{ route("revenues.index") }}" class="kt-menu__link ">
                            <i class="kt-menu__link-icon fa fa-cube"></i>
                            <span class="kt-menu__link-text">
                                Revenue
                            </span>
                        </a>
                    </li>

                    <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{route('my_profile')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-icon fa fa-cube"></i>
                            <span class="kt-menu__link-text">
                                My Profile
                            </span>
                        </a>
                    </li>
                </ul>
            @elseif(auth()->user()->is_contractor_user())
                <ul class="kt-menu__nav ">
                    <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{route('home')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-icon fa fa-cube"></i>
                            <span class="kt-menu__link-text">
                                Dashboard
                            </span>
                        </a>
                    </li>

                    <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{route('projects.index')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-icon fa fa-cube"></i>
                            <span class="kt-menu__link-text">
                                Projects
                            </span>
                        </a>
                    </li>

                    <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{route('my_profile')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-icon fa fa-cube"></i>
                            <span class="kt-menu__link-text">
                                My Profile
                            </span>
                        </a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>