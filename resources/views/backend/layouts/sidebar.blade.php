				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
					<!-- BEGIN: Aside Menu -->
	<div 
		id="m_ver_menu" 
		class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
		m-menu-vertical="1"
		 m-menu-scrollable="0" m-menu-dropdown-timeout="500"  
		>
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
							<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
								<a  href="index.html" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-line-graph"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Dashboard
											</span>
											<span class="m-menu__link-badge">
												<span class="m-badge m-badge--danger">
													2
												</span>
											</span>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__section ">
								<h4 class="m-menu__section-text">
									Components
								</h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>
						@can('show_user')
						<li class="m-menu__item  m-menu__item--submenu {{ isset($active) && $active == 'users' ? 'm-menu__item--open m-menu__item--expanded' : '' }}" aria-haspopup="true"  m-menu-submenu-toggle="hover">
							<a  href="javascript:;" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-icon flaticon-layers"></i>
								<span class="m-menu__link-text">
									{{ __('Users') }}
								</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
								
									<li class="m-menu__item {{ isset($active) && $active == 'users' ? 'm-menu__item--active' : '' }}" aria-haspopup="true" >
										<a  href="{{ route('admin.users.index') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot" >
												<span></span>
											</i>
											<span class="m-menu__link-text" id="goPage" data-route='users.index'>
												{{ __('Show users') }}
											</span>
										</a>
									</li>
									

								</ul>
							</div>
						</li>
						@endcan
							@can('show_roles')
							<li class="m-menu__item  m-menu__item--submenu {{ isset($active) && $active == 'roles' ? 'm-menu__item--open m-menu__item--expanded' : '' }}" aria-haspopup="true"  m-menu-submenu-toggle="hover">
								<a  href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-layers"></i>
									<span class="m-menu__link-text">
										{{ __('Roles') }}
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
									
										<li class="m-menu__item {{ isset($active) && $active == 'roles' ? 'm-menu__item--active' : '' }}" aria-haspopup="true" >
											<a  href="{{ route('admin.roles.index') }}" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot" >
													<span></span>
												</i>
												<span class="m-menu__link-text" id="goPage" data-route='roles.index'>
													{{ __('Show roles') }}
												</span>
											</a>
										</li>
										

									</ul>
								</div>
							</li>
							@endcan
							@can('show_products')
							<li class="m-menu__item  m-menu__item--submenu {{ isset($active) && $active == 'products' ? 'm-menu__item--open m-menu__item--expanded' : '' }}" aria-haspopup="true"  m-menu-submenu-toggle="hover">
								<a  href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-layers"></i>
									<span class="m-menu__link-text">
										{{ __('Products') }}
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
									
										<li class="m-menu__item {{ isset($active) && $active == 'products' ? 'm-menu__item--active' : '' }}" aria-haspopup="true" >
											<a  href="{{ route('admin.products.index') }}" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot" >
													<span></span>
												</i>
												<span class="m-menu__link-text" id="goPage" data-route='products.index'>
													{{ __('Show products') }}
												</span>
											</a>
										</li>
										<li class="m-menu__item {{ isset($active) && $active == 'products' ? 'm-menu__item--active' : '' }}" aria-haspopup="true" >
											<a  href="{{ route('admin.products.categories.index') }}" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot" >
													<span></span>
												</i>
												<span class="m-menu__link-text" id="goPage" data-route='categories.index'>
													{{ __('Show categories') }}
												</span>
											</a>
										</li>
										<li class="m-menu__item {{ isset($active) && $active == 'products' ? 'm-menu__item--active' : '' }}" aria-haspopup="true" >
											<a  href="{{ route('admin.products.colors.index') }}" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot" >
													<span></span>
												</i>
												<span class="m-menu__link-text" id="goPage" data-route='colors.index'>
													{{ __('Show colors') }}
												</span>
											</a>
										</li>
										<li class="m-menu__item {{ isset($active) && $active == 'products' ? 'm-menu__item--active' : '' }}" aria-haspopup="true" >
											<a  href="{{ route('admin.products.sizes.index') }}" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot" >
													<span></span>
												</i>
												<span class="m-menu__link-text" id="goPage" data-route='sizes.index'>
													{{ __('Show sizes') }}
												</span>
											</a>
										</li>
										

									</ul>
								</div>
							</li>
							@endcan
							@can('show_sliders')
							<li class="m-menu__item  m-menu__item--submenu {{ isset($active) && $active == 'slider' ? 'm-menu__item--open m-menu__item--expanded' : '' }}" aria-haspopup="true"  m-menu-submenu-toggle="hover">
								<a  href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-layers"></i>
									<span class="m-menu__link-text">
										{{ __('Slider') }}
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
									
										<li class="m-menu__item {{ isset($active) && $active == 'slider' ? 'm-menu__item--active' : '' }}" aria-haspopup="true" >
											<a  href="{{ route('admin.sliders.index') }}" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot" >
													<span></span>
												</i>
												<span class="m-menu__link-text" id="goPage" data-route='slider.index'>
													{{ __('Show slider') }}
												</span>
											</a>
										</li>
										

									</ul>
								</div>
							</li>
							@endcan
						</ul>
					</div>
					<!-- END: Aside Menu -->
				</div>
				<!-- END: Left Aside -->