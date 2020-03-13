<div class="header-top-area">
    <div class="container-fluid">
        <div class="row bgx ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header-top-wraper">
                    <div class="row">
                        <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                            <div class="menu-switcher-pro">
                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
									<i class="educate-icon educate-nav"></i>
								</button>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                        </div>

                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <div class="header-right-info">
                                <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                    <li class="nav-item">
                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
											<img style="width:30px; height:30px;" src="{{ auth()->user()->user_profile }}" alt="" />
											<span class="admin-name">
                                                {{ auth()->user()->name }}
                                            </span>
											<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
										</a>

                                        <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                            <li>
                                                <a href="{{ route("my_profile") }}">
                                                    <span class="edu-icon edu-user-rounded author-log-ic"></span>
                                                    My Profile
                                                </a>
                                            </li>

                                            <li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <span class="edu-icon edu-locked author-log-ic"></span>
                                                    Log Out
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
