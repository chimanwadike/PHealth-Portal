<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " data-ktheader-minimize="on">
	<div class="kt-header__top">
		<div class="kt-container">
			<div class="kt-header__brand  kt-aside__brand--skin-light   kt-grid__item" id="kt_header_brand">
				<div class="kt-header__brand-logo">
					<a href="{{ route("home") }}">
						<img width="70px" alt="Logo" src="{{asset('assets/media/logos/logo1.png')}}" />
					</a>
				</div>
			</div>

			@if(!auth()->user()->hasVerifiedEmail())
				<div class="kt-header__topbar-item text-center kt-hidden-mobile" data-toggle="kt-tooltip" title="Verification Notification" data-placement="center">
					<div class="kt-header__topbar-wrapper">
						<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
	                        @csrf
	                        <span class="text-danger d-block">Your email has not been verified</span>
	                        <button type="submit" class="btn p-0 m-0 align-baseline btn-success">
	                        	Resend Verification Email
	                        </button>.
	                    </form>
					</div>
				</div>
			@endif

			<div class="kt-header__topbar">
				<!--begin: Quick panel toggler -->
				@if(!auth()->user()->hasVerifiedEmail())
					<div class="kt-header__topbar-item text-center kt-hidden-desktop" data-toggle="kt-tooltip" title="Verification Notification" data-placement="center">
						<div class="kt-header__topbar-wrapper">
							<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
		                        @csrf
		                        <span class="text-danger">Your email has not been verified</span>
		                        <button type="submit" class="btn p-0 m-0 align-baseline btn-success">
		                        	Resend Verification Email
		                        </button>.
		                    </form>
						</div>
					</div>
				@endif

				<div class="kt-header__topbar-item" data-toggle="kt-tooltip" title="Quick panel" data-placement="top" onclick="isclicked();">
					<div class="kt-header__topbar-wrapper">
						<span class="kt-header__topbar-icon kt-header__topbar-icon--danger" id="kt_quick_panel_toggler_btn">
							@if(auth()->user()->notification > 0)
								<div class="notification-box">
									<span class="notification-count" id="number">{{ auth()->user()->notification }}</span>
									<div class="notification-bell">
										<span class="bell-top"></span>
										<span class="bell-middle"></span>
										<span class="bell-bottom"></span>
										<span class="bell-rad"></span>
									</div>
								</div>
							@else
								<div class="notification-box hide-notification">
									<span class="notification-count" id="number">0</span>
									<div class="notification-bell">
										<span class="bell-top"></span>
										<span class="bell-middle"></span>
										<span class="bell-bottom"></span>
										<span class="bell-rad"></span>
									</div>
								</div>
							@endif

							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--danger">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect id="bound" x="0" y="0" width="24" height="24" />
									<rect id="Rectangle-7" fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
									<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
								</g>
							</svg>
							<!--<i class="flaticon2-menu-2"></i>-->
						</span>
					</div>
				</div>
				<!--end: Quick panel toggler -->

				<!--begin: User bar -->
				<div class="kt-header__topbar-item kt-header__topbar-item--user">
					<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,10px">
						<img class="kt-hidden-" alt="Pic" src="{{ auth()->user()->user_profile }}" />
					</div>

					<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
						<!--begin: Head -->
						<div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
							<div class="kt-user-card__avatar">
								<img class="kt-hidden-" alt="Pic" src="{{ auth()->user()->user_profile }}" />
							</div>
							<div class="kt-user-card__name">
								{{ auth()->user()->name }}
							</div>
							<div class="kt-user-card__badge">
								@if(auth()->user()->notifications->count() > 0)
									<span class="btn btn-label-primary btn-sm btn-bold btn-font-md">
										{{ auth()->user()->notifications->count() }} notifications
									</span>
								@endif
							</div>
						</div>

						@if(auth()->user()->is_staff_user())
							<div class="kt-notification">
								<a href="{{ route("my_profile") }}" class="kt-notification__item">
									<div class="kt-notification__item-icon">
										<i class="flaticon2-calendar-3 kt-font-success"></i>
									</div>
									<div class="kt-notification__item-details">
										<div class="kt-notification__item-title kt-font-bold">
											My Profile
										</div>
										<div class="kt-notification__item-time">
											Account settings and more
										</div>
									</div>
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			                        @csrf
			                    </form>

								<div class="kt-notification__custom">
									<a class="btn btn-label-brand btn-sm btn-bold" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
										Sign Out
			                        </a>
								</div>
							</div>
						@elseif(auth()->user()->is_contractor_user())
							<div class="kt-notification">
								<a href="{{ route("my_profile") }}" class="kt-notification__item">
									<div class="kt-notification__item-icon">
										<i class="flaticon2-calendar-3 kt-font-success"></i>
									</div>
									<div class="kt-notification__item-details">
										<div class="kt-notification__item-title kt-font-bold">
											My Profile
										</div>
										<div class="kt-notification__item-time">
											Account settings and more
										</div>
									</div>
								</a>
								{{-- <a href="#" class="kt-notification__item">
									<div class="kt-notification__item-icon">
										<i class="flaticon2-mail kt-font-warning"></i>
									</div>
									<div class="kt-notification__item-details">
										<div class="kt-notification__item-title kt-font-bold">
											My Messages
										</div>
										<div class="kt-notification__item-time">
											Inbox and tasks
										</div>
									</div>
								</a>
								<a href="#" class="kt-notification__item">
									<div class="kt-notification__item-icon">
										<i class="flaticon2-rocket-1 kt-font-danger"></i>
									</div>
									<div class="kt-notification__item-details">
										<div class="kt-notification__item-title kt-font-bold">
											My Activities
										</div>
										<div class="kt-notification__item-time">
											Logs and notifications
										</div>
									</div>
								</a>
								<a href="#" class="kt-notification__item">
									<div class="kt-notification__item-icon">
										<i class="flaticon2-hourglass kt-font-brand"></i>
									</div>
									<div class="kt-notification__item-details">
										<div class="kt-notification__item-title kt-font-bold">
											My Tasks
										</div>
										<div class="kt-notification__item-time">
											latest tasks and projects
										</div>
									</div>
								</a> --}}

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			                        @csrf
			                    </form>

								<div class="kt-notification__custom">
									<a class="btn btn-label-brand btn-sm btn-bold" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
										Sign Out
			                        </a>
								</div>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>