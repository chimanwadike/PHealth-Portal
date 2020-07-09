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

                            <li>
                                <a title="Landing Page" href="#" aria-expanded="false">
                                    <span class="icon-wrap" aria-hidden="true"></span>
                                    <span class="mini-click-non">Dashboards</span>
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
                                        <span class="mini-sub-pro">All Clients</span>
                                    </a>
                                </li>

                                <li>
                                    <a title="Download Client Line List" href="#" data-toggle="modal" data-target="#linelistModal" aria-expanded="false">
                                        <span class="icon-wrap" aria-hidden="true"></span>
                                        <span class="mini-click-non">Download Clients</span>
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
