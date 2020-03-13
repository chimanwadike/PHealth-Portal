<!-- Mobile Menu start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li>
                                <a href="{{ route("home") }}">
                                    Home
                                </a>
                            </li>

                            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordinator'))
                                <li>
                                    <a href="{{ route("users.index") }}">
                                        Users
                                    </a>
                                </li>
                            @endif

                            @if(auth()->user()->hasRole('admin'))
                                <li>
                                    <a href="{{ route("facilities.index") }}">
                                        Facilities
                                    </a>
                                </li>
                            @endif

                            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordinator'))
                                <li>
                                    <a class="has-arrow" aria-expanded="false">
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
                                        <span class="educate-icon educate-home icon-wrap" aria-hidden="true"></span>
                                        <span class="mini-click-non">Clients</span>
                                    </a>
                                </li>
                            @endif


                            <li>
                                <a href="{{ route("my_profile") }}">
                                    Profile
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>