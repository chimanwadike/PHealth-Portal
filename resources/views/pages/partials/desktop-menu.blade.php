<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="{{ route("home") }}">
                <img class="main-logo" src="{{ asset('img/logo/logo.png') }}" alt="" />
            </a>

            <strong>
                <a href="{{ route("home") }}">

                    <img src="{{ asset('img/logo/logosn.png') }}" alt="" />
                </a>
            </strong>
        </div>

        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li>
                        <a title="Landing Page" href="{{ route("home") }}" aria-expanded="false">
                            <span class="fa fa-home icon-wrap" aria-hidden="true"></span>
                            <span class="mini-click-non">Home</span>
                        </a>
                    </li>


                    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordinator'))
                        <li>
                            <a title="Landing Page" href="{{ route('users.index') }}" aria-expanded="false">
                                <span class="fa fa-user-o icon-wrap" aria-hidden="true"></span>
                                <span class="mini-click-non">Users</span>
                            </a>
                        </li>
                    @endif


                    @if(auth()->user()->hasRole('admin'))
                        <li>
                            <a title="Landing Page" href="{{ route('facilities.index') }}" aria-expanded="false">
                                <span class="fa fa-hospital-o icon-wrap" aria-hidden="true"></span>
                                <span class="mini-click-non">Facilities</span>
                            </a>
                        </li>
                    @endif

                    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordinator'))
                        <li>
                            <a class="has-arrow" aria-expanded="false">
                                <span class="fa fa-group icon-wrap"></span>
                                <span class="mini-click-non">
                                    Clients
                                </span>
                            </a>

                            <ul class="submenu-angle" aria-expanded="false">
                                <li>
                                    <a href="{{ route("clients.index") }}">
                                        <span class="mini-sub-pro">All Clients</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route("clients.users") }}">
                                        <span class="mini-sub-pro">By User</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route("clients.facilities") }}">
                                        <span class="mini-sub-pro">By Facility</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route("clients.refered_facilities") }}">
                                        <span class="mini-sub-pro">By Refered Facility</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route("clients.states") }}">
                                        <span class="mini-sub-pro">By State</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route("clients.lgas") }}">
                                        <span class="mini-sub-pro">By LGA</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @elseif(auth()->user()->hasRole('facility'))
                        <li>
                            <a title="Landing Page" href="{{ route('clients.index') }}" aria-expanded="false">
                                <span class="fa fa-group icon-wrap" aria-hidden="true"></span>
                                <span class="mini-click-non">Clients</span>
                            </a>
                        </li>
                    @endif

                    <li>
                        <a title="Landing Page" href="{{ route("my_profile") }}" aria-expanded="false">
                            <span class="fa fa-address-book-o icon-wrap" aria-hidden="true"></span>
                            <span class="mini-click-non">Profile</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>
