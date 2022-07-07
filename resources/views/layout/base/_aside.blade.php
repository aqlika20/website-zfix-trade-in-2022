{{-- Aside --}}

@php
    $kt_logo_image = 'logo-light.png';
@endphp

@if (config('layout.brand.self.theme') === 'light')
    @php $kt_logo_image = 'logo-default-inverse.png' @endphp
@elseif (config('layout.brand.self.theme') === 'dark')
    @php $kt_logo_image = 'logo-default-inverse.png' @endphp
@endif

<div class="aside aside-left {{ Metronic::printClasses('aside', false) }} d-flex flex-column flex-row-auto" id="kt_aside">

    {{-- Brand --}}
    <div class="brand flex-column-auto {{ Metronic::printClasses('brand', false) }}" id="kt_brand">
        <div class="brand-logo">
            <a href="{{ url('/') }}">
                <img alt="{{ config('app.name') }}" src="{{ asset('media/logos/'.$kt_logo_image) }}"/>
            </a>
        </div>

        @if (config('layout.aside.self.minimize.toggle'))
            <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                {{ Metronic::getSVG("media/svg/icons/Navigation/Angle-double-left.svg", "svg-icon-xl") }}
            </button>
        @endif

    </div>

    {{-- Aside menu --}}
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

        @if (config('layout.aside.self.display') === false)
            <div class="header-logo">
                <a href="{{ url('/') }}">
                    <img alt="{{ config('app.name') }}" src="{{ asset('media/logos/'.$kt_logo_image) }}"/>
                </a>
            </div>
        @endif

        <div
            id="kt_aside_menu"
            class="aside-menu my-4 {{ Metronic::printClasses('aside_menu', false) }}"
            data-menu-vertical="1"
            {{ Metronic::printAttrs('aside_menu') }}>

            <ul class="menu-nav ">
                <li class="menu-item {{ (strpos($page_title, 'Dashboard') !== false) ? 'menu-item-active' : '' }}" aria-haspopup="true"><a href="{{ route('index') }}" class="menu-link ">
                <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:media/svg/icons/Design/Layers.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"></path>
                        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"></path>
                    </g>
                </svg><!--end::Svg Icon-->
                </span>
                <span class="menu-text">Dashboard</span></a></li>
                @if ($currentUser->roles_id != 5) 
                <li class="menu-item  menu-item-submenu {{ (strpos(Route::currentRouteName(), 'process') !== false) ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover"><a href="#" class="menu-link menu-toggle">
                <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:media/svg/icons/Layout/Layout-4-blocks.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
                        <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
                    </g>
                </svg><!--end::Svg Icon-->
                </span>
                <span class="menu-text">Process</span><i class="menu-arrow"></i></a>
                <div class="menu-submenu ">
                <span class="menu-arrow"></span>
                    <ul class="menu-subnav">
                        <li class="menu-item  menu-item-parent" aria-haspopup="true">
                            <span class="menu-link"><span class="menu-text">Process</span></span>
                        </li>
                        @if ($currentUser->roles_id == 4) 
                        <li class="menu-item {{ (strpos($page_title, 'Invoice') !== false) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('invoice') }}" class="menu-link "><i class="menu-bullet menu-bullet-line"><span></span></i><span class="menu-text">Invoice</span></a>
                        </li>
                        @endif
                        <li class="menu-item {{ (strpos($page_title, 'Phone Trade') !== false) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('phone-trade') }}" class="menu-link "><i class="menu-bullet menu-bullet-line"><span></span></i><span class="menu-text">Phone</span></a>
                        </li>
                        <li class="menu-item {{ (strpos($page_title, 'Laptop Trade') !== false) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('laptop-trade') }}" class="menu-link "><i class="menu-bullet menu-bullet-line"><span></span></i><span class="menu-text">Laptop</span></a>
                        </li>
                        <li class="menu-item {{ (strpos($page_title, 'Televisi Trade') !== false) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('tv-trade') }}" class="menu-link "><i class="menu-bullet menu-bullet-line"><span></span></i><span class="menu-text">Televisi</span></a>
                        </li>
                        <li class="menu-item {{ (strpos($page_title, 'Playstation Trade') !== false) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('ps-trade') }}" class="menu-link "><i class="menu-bullet menu-bullet-line"><span></span></i><span class="menu-text">Playstation</span></a>
                        </li>
                        <li class="menu-item {{ (strpos($page_title, 'Kulkas Trade') !== false) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('kulkas-trade') }}" class="menu-link "><i class="menu-bullet menu-bullet-line"><span></span></i><span class="menu-text">Kulkas</span></a>
                        </li>
                        <li class="menu-item {{ (strpos($page_title, 'Mesin Cuci Trade') !== false) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('mesin-cuci-trade') }}" class="menu-link "><i class="menu-bullet menu-bullet-line"><span></span></i><span class="menu-text">Mesin Cuci</span></a>
                        </li>
                    </ul>
                </div>
                </li>
                @endif


                @if ($currentUser->roles_id == 1) 
                <li class="menu-item  menu-item-submenu {{ (strpos(Route::currentRouteName(), 'price') !== false) ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover"><a href="#" class="menu-link menu-toggle">
                <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:media/svg/icons/General/Settings-2.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path d="M3.52270623,14.028695 C2.82576459,13.3275941 2.82576459,12.19529 3.52270623,11.4941891 L11.6127629,3.54050571 C11.9489429,3.20999263 12.401513,3.0247814 12.8729533,3.0247814 L19.3274172,3.0247814 C20.3201611,3.0247814 21.124939,3.82955935 21.124939,4.82230326 L21.124939,11.2583059 C21.124939,11.7406659 20.9310733,12.2027862 20.5869271,12.5407722 L12.5103155,20.4728108 C12.1731575,20.8103442 11.7156477,21 11.2385688,21 C10.7614899,21 10.3039801,20.8103442 9.9668221,20.4728108 L3.52270623,14.028695 Z M16.9307214,9.01652093 C17.9234653,9.01652093 18.7282432,8.21174298 18.7282432,7.21899907 C18.7282432,6.22625516 17.9234653,5.42147721 16.9307214,5.42147721 C15.9379775,5.42147721 15.1331995,6.22625516 15.1331995,7.21899907 C15.1331995,8.21174298 15.9379775,9.01652093 16.9307214,9.01652093 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>

                    </g>
                </svg><!--end::Svg Icon-->
                </span>
                <span class="menu-text">Price</span><i class="menu-arrow"></i></a>
                <div class="menu-submenu ">
                <span class="menu-arrow"></span>
                    <ul class="menu-subnav">
                        <li class="menu-item  menu-item-parent" aria-haspopup="true">
                            <span class="menu-link"><span class="menu-text">Price</span></span>
                        </li>
                        <li class="menu-item {{ (strpos($page_title, 'Phone') !== false) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('price_handphone') }}" class="menu-link "><i class="menu-bullet menu-bullet-line"><span></span></i><span class="menu-text">Phone</span></a>
                        </li>
                        <li class="menu-item {{ (strpos($page_title, 'Televisi') !== false) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('price_tv') }}" class="menu-link "><i class="menu-bullet menu-bullet-line"><span></span></i><span class="menu-text">Televisi</span></a>
                        </li>
                         <li class="menu-item {{ (strpos($page_title, 'Playstation') !== false) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('price_ps') }}" class="menu-link "><i class="menu-bullet menu-bullet-line"><span></span></i><span class="menu-text">Playstation</span></a>
                        </li> 
                        <li class="menu-item {{ (strpos($page_title, 'Laptop') !== false) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('price_laptop') }}" class="menu-link "><i class="menu-bullet menu-bullet-line"><span></span></i><span class="menu-text">Laptop</span></a>
                        </li>
                        <li class="menu-item {{ (strpos($page_title, 'Laptop') !== false) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('price_kulkas') }}" class="menu-link "><i class="menu-bullet menu-bullet-line"><span></span></i><span class="menu-text">Kulkas</span></a>
                        </li>
                        <li class="menu-item {{ (strpos($page_title, 'Laptop') !== false) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('price_mesin_cuci') }}" class="menu-link "><i class="menu-bullet menu-bullet-line"><span></span></i><span class="menu-text">Mesin Cuci</span></a>
                        </li>
                    </ul>
                </div>
                </li>
                @endif

                @if ($currentUser->roles_id == 1) 
                <li class="menu-item  menu-item-submenu {{ (strpos(Route::currentRouteName(), 'setting') !== false) ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover"><a href="#" class="menu-link menu-toggle">
                <span class="svg-icon menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"></path>
                        <path d="M12,13 C10.8954305,13 10,12.1045695 10,11 C10,9.8954305 10.8954305,9 12,9 C13.1045695,9 14,9.8954305 14,11 C14,12.1045695 13.1045695,13 12,13 Z" fill="#000000" opacity="0.3"></path>
                        <path d="M7.00036205,18.4995035 C7.21569918,15.5165724 9.36772908,14 11.9907452,14 C14.6506758,14 16.8360465,15.4332455 16.9988413,18.5 C17.0053266,18.6221713 16.9988413,19 16.5815,19 C14.5228466,19 11.463736,19 7.4041679,19 C7.26484009,19 6.98863236,18.6619875 7.00036205,18.4995035 Z" fill="#000000" opacity="0.3"></path>
                    </g>
                </svg>
                </span>
                <span class="menu-text">Partner</span><i class="menu-arrow"></i></a>
                <div class="menu-submenu ">
                <span class="menu-arrow"></span>
                    <ul class="menu-subnav">
                        <li class="menu-item  menu-item-parent" aria-haspopup="true">
                            <span class="menu-link"><span class="menu-text">Partner</span></span>
                        </li>
                        <li class="menu-item {{ (strpos($page_title, 'Partner Management') !== false) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('partner.index') }}" class="menu-link "><i class="menu-bullet menu-bullet-line"><span></span></i><span class="menu-text">Partner Management</span></a>
                        </li>
                    </ul>
                </div>
                </li>

                <li class="menu-item  menu-item-submenu {{ (strpos(Route::currentRouteName(), 'setting') !== false) ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover"><a href="#" class="menu-link menu-toggle">
                <span class="svg-icon menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"></path>
                    </g>
                </svg>
                </span>
                <span class="menu-text">Setting</span><i class="menu-arrow"></i></a>
                <div class="menu-submenu ">
                <span class="menu-arrow"></span>
                    <ul class="menu-subnav">
                        <li class="menu-item  menu-item-parent" aria-haspopup="true">
                            <span class="menu-link"><span class="menu-text">Setting</span></span>
                        </li>
                        <li class="menu-item {{ (strpos($page_title, 'Setting Management') !== false) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('user-management.index') }}" class="menu-link "><i class="menu-bullet menu-bullet-line"><span></span></i><span class="menu-text">User Management</span></a>
                        </li>
                    </ul>
                </div>
                </li>

                @endif
            </ul>
        </div>
    </div>

</div>
