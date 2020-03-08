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

                            
                            <li>
                                <a href="{{ route("clients.index") }}">
                                    Clients
                                </a>
                            </li>

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