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

                    <li>
                        <a title="Landing Page" href="#" aria-expanded="false">
                            <span class="fa fa-dashboard icon-wrap" aria-hidden="true"></span>
                            <span class="mini-click-non">Dashboards</span>
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
                            <a href="{{ route("clients.index") }}">
                                <span class="fa fa-group icon-wrap"></span>
                                <span class="mini-sub-pro">All Clients</span>
                            </a>
                        </li>

                        <li>
                            <a title="Download Client Line List" href="#" data-toggle="modal" data-target="#linelistModal" aria-expanded="false">
                                <span class="fa fa-download icon-wrap" aria-hidden="true"></span>
                                <span class="mini-click-non">Export Line List</span>
                            </a>
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

<!-- Modal -->
<div class="modal fade" id="linelistModal" tabindex="-1" role="dialog" aria-labelledby="linelistModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Export Line List</h5>
            </div>
            <form action="{{Route('export.clients')}}" method="post" id="line_list_form">
                @csrf
            <div class="modal-body">
                     <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>End Date</label>
                        <input type="date" name="end_date" class="form-control">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"  onclick="event.preventDefault(); document.getElementById('line_list_form').submit();" >Export Data</button>
            </div>
            </form>
        </div>
    </div>
</div>
