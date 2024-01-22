<!--begin::sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
            <!--begin::Logo-->
            <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
                <!--begin::Logo image-->
                <a href="../../demo1/dist/index.html">
                    <img alt="Logo" src="{{asset('public/assets/media/logos/default-dark.svg')}}" class="h-25px app-sidebar-logo-default" />
                    <img alt="Logo" src="{{asset('public/assets/media/logos/default-small.svg')}}" class="h-20px app-sidebar-logo-minimize" />
                </a>
                <!--end::Logo image-->
                <!--begin::Sidebar toggle-->
                <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
                    <span class="svg-icon svg-icon-2 rotate-180">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor" />
                            <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Sidebar toggle-->
            </div>
            <!--end::Logo-->
            <!--begin::sidebar menu-->
            <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                <!--begin::Menu wrapper-->
                <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
                    <!--begin::Menu-->
                    <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('adminDashboard') }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                            <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                            <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
                                            <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Dashboard</span>
                               
                            </span>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                         <!--begin:Menu item-->
                         <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ url('admin/viewcate') }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                            <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                            <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
                                            <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Category</span>
                                </a>
                            </span>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                         <!--begin:Menu item-->
                         <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                            <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                            <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
                                            <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Customer</span>
                               
                            </span>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <div class="menu-item here show menu-accordion video">
                            <!--begin:Menu link-->
                            <a href="{{ url('admin/video/add') }}" class="menu-link">
                                <span class="menu-icon">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier"> 
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.3276 7.54199H8.67239C5.29758 7.54199 3.61017 7.54199 2.66232 8.52882C1.71447 9.51565 1.93748 11.0403 2.38351 14.0895L2.80648 16.9811C3.15626 19.3723 3.33115 20.5679 4.22834 21.2839C5.12553 21.9999 6.4488 21.9999 9.09534 21.9999H14.9046C17.5512 21.9999 18.8745 21.9999 19.7717 21.2839C20.6689 20.5679 20.8437 19.3723 21.1935 16.9811L21.6165 14.0895C22.0625 11.0403 22.2855 9.51564 21.3377 8.52882C20.3898 7.54199 18.7024 7.54199 15.3276 7.54199ZM14.5812 15.7942C15.1396 15.448 15.1396 14.5519 14.5812 14.2057L11.2096 12.1156C10.6669 11.7792 10 12.2171 10 12.9098V17.0901C10 17.7828 10.6669 18.2207 11.2096 17.8843L14.5812 15.7942Z" fill="#ffffff"></path> 
                                            <path opacity="0.4" d="M8.50956 2.00001H15.4897C15.7221 1.99995 15.9004 1.99991 16.0562 2.01515C17.164 2.12352 18.0708 2.78958 18.4553 3.68678H5.54395C5.92846 2.78958 6.83521 2.12352 7.94303 2.01515C8.09884 1.99991 8.27708 1.99995 8.50956 2.00001Z" fill="#ffffff"></path>
                                            <path opacity="0.7" d="M6.3102 4.72266C4.91958 4.72266 3.77931 5.56241 3.39878 6.67645C3.39085 6.69967 3.38325 6.72302 3.37598 6.74647C3.77413 6.6259 4.18849 6.54713 4.60796 6.49336C5.68833 6.35485 7.05367 6.35492 8.6397 6.35501H15.5318C17.1178 6.35492 18.4832 6.35485 19.5635 6.49336C19.983 6.54713 20.3974 6.6259 20.7955 6.74647C20.7883 6.72302 20.7806 6.69967 20.7727 6.67645C20.3922 5.56241 19.2519 4.72266 17.8613 4.72266H6.3102Z" fill="#ffffff"></path>
                                        </g>
                                    </svg>    
                                </span>
                                <span class="menu-title">Video</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                         <!--begin:Menu item-->
                         <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                            <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                            <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
                                            <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Business</span>
                               
                            </span>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        
                         <!--begin:Menu item-->
                         <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                            <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                            <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
                                            <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Business Review</span>
                               
                            </span>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Menu wrapper-->
            </div>
            <!--end::sidebar menu-->
        </div>
        <!--end::sidebar-->