{{-- Site header — desktop nav, phone, cart, login, mobile hamburger --}}
<header class="tg-header-height">

    <div class="tg-header__area tg-header-lg-space z-index-999 tg-transparent d-none d-xl-block" id="header-sticky">
        <div class="container-fluid container-1860">
            <div class="row align-items-center">
                <div class="col-lg-7 col-5">
                    <div class="tgmenu__wrap d-flex align-items-center">
                        <div class="logo">
                            <a class="logo-1" href="{{ route('home') }}">
                                <img src="{{ asset($general_setting->logo) }}" alt="Logo">
                            </a>
                            <a class="logo-2 d-none" href="{{ route('home') }}">
                                <img src="{{ asset($general_setting->secondary_logo) }}" alt="Logo">
                            </a>
                        </div>

                        <nav class="tgmenu__nav tgmenu-1-space ml-180">
                            <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                @include('components.common_navitems')
                            </div>
                        </nav>
                    </div>
                </div>

                <div class="col-lg-5 col-7">
                    <div class="tg-menu-right-action d-flex align-items-center justify-content-end">
                        <div class="tg-header-contact-info d-flex align-items-center">
                            <span class="tg-header-contact-icon mr-5 d-none d-xl-block">

                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M17.5747 15.8619L15.8138 17.6228C15.7656 17.6732 15.7236 17.7026 15.6627 17.7362C13.1757 19.0753 8.40326 16.5734 6.21009 14.2626C6.18698 14.2374 6.16809 14.2185 6.14502 14.1954C3.83427 12.0021 1.33257 7.22927 2.67157 4.7421C2.70515 4.68124 2.73453 4.64134 2.78491 4.5931L4.54573 2.83006C4.67586 2.69992 4.82067 2.64116 5.00114 2.64116H5.01583C5.20471 2.64327 5.35163 2.71044 5.47965 2.84895L7.75047 5.30044C7.98973 5.55651 7.98131 5.95109 7.73368 6.19877L6.26666 7.66589C5.85321 8.08148 5.67271 8.62926 5.75877 9.20856C5.94134 10.428 6.55419 11.574 7.63293 12.7095C7.65603 12.7326 7.67489 12.7536 7.69799 12.7746C8.83342 13.8534 9.97723 14.4663 11.1966 14.6488C11.7779 14.7349 12.3257 14.5544 12.7412 14.1388L14.2062 12.6738C14.4538 12.4261 14.8484 12.4177 15.1065 12.6549L17.5578 14.9259C17.6963 15.0539 17.7614 15.2008 17.7656 15.3897C17.7698 15.5785 17.709 15.7276 17.5747 15.8619Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <div class="tg-header-contact-number d-none d-xl-block">
                                <span>{{ __('translate.Call Us') }}:</span>
                                <a href="tel:{{ $footer->phone }}">{{ $footer->phone }}</a>
                            </div>
                        </div>




                        <div class="tg-header-btn ml-20 d-none d-sm-block">
                            @guest('web')
                            <a class="tg-btn-header" href="{{ route('user.login') }}">{{ __('translate.Login') }}</a>
                            @else
                            <a class="tg-btn-header"
                                href="{{ Auth::guard('web')->user()->is_seller == 1 ? route('agency.dashboard') : route('user.dashboard') }}">
                                {{ __('translate.Dashboard') }}
                            </a>
                            @endguest
                        </div>

                        {{-- Combined Language & Currency Dropdown --}}
                        @php
                        $__languages = \Modules\Language\App\Models\Language::where('status', 1)->get();
                        $__currencies = \Modules\Currency\App\Models\Currency::where('status', 'active')->get();
                        $__currentLang = session('front_lang', 'en');
                        $__currentLangName = session('front_lang_name', 'English');
                        $__currentCurrIcon = session('currency_icon', '€');
                        $__currentCurrCode = session('currency_code', 'EUR');
                        $__flagMap = ['en' => '🇬🇧', 'pl' => '🇵🇱', 'ro' => '🇷🇴', 'de' => '🇩🇪', 'fr' => '🇫🇷',
                        'es' => '🇪🇸', 'it' => '🇮🇹'];
                        $__currentFlag = $__flagMap[$__currentLang] ?? '🌐';
                        @endphp
                        <div class="lc-dropdown-wrap d-none d-xl-block ml-20" style="position:relative;">
                            <button type="button" class="lc-dropdown-toggle" id="lcDropdownBtn"
                                style="background:none;border:1px solid rgba(255,255,255,.4);border-radius:8px;padding:6px 14px;cursor:pointer;display:flex;align-items:center;gap:6px;font-size:14px;color:#fff;transition:all .2s;">
                                <span style="font-size:16px;">{{ $__currentFlag }}</span>
                                <span style="font-weight:500;">{{ $__currentCurrIcon }}</span>
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none" style="margin-left:2px;">
                                    <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                            <div class="lc-dropdown-menu" id="lcDropdownMenu"
                                style="display:none;position:absolute;top:calc(100% + 8px);right:0;background:#fff;border-radius:12px;box-shadow:0 8px 30px rgba(0,0,0,.12);min-width:220px;z-index:9999;overflow:hidden;">
                                {{-- Language Section --}}
                                <div style="padding:14px 16px 8px;">
                                    <div
                                        style="font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.5px;color:#888;margin-bottom:8px;">
                                        🌐 {{ __('translate.Language') }}
                                    </div>
                                    @foreach($__languages as $lang)
                                    <a href="{{ route('language-switcher', ['lang_code' => $lang->lang_code]) }}"
                                        style="display:flex;align-items:center;gap:8px;padding:8px 10px;border-radius:8px;text-decoration:none;color:#333;font-size:14px;transition:background .15s;{{ $__currentLang === $lang->lang_code ? 'background:#f0f7ff;font-weight:600;color:#e86532;' : '' }}"
                                        onmouseover="this.style.background='#f5f5f5'"
                                        onmouseout="this.style.background='{{ $__currentLang === $lang->lang_code ? '#f0f7ff' : 'transparent' }}'">
                                        <span style="font-size:18px;">{{ $__flagMap[$lang->lang_code] ?? '🌐' }}</span>
                                        <span>{{ $lang->lang_name }}</span>
                                        @if($__currentLang === $lang->lang_code)
                                        <span style="margin-left:auto;color:#e86532;">✓</span>
                                        @endif
                                    </a>
                                    @endforeach
                                </div>
                                {{-- Divider --}}
                                <div style="height:1px;background:#eee;margin:4px 16px;"></div>
                                {{-- Currency Section --}}
                                <div style="padding:8px 16px 14px;">
                                    <div
                                        style="font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.5px;color:#888;margin-bottom:8px;">
                                        💱 {{ __('translate.Currency') }}
                                    </div>
                                    @foreach($__currencies as $curr)
                                    <a href="{{ route('currency-switcher', ['currency_code' => $curr->currency_code]) }}"
                                        style="display:flex;align-items:center;gap:8px;padding:8px 10px;border-radius:8px;text-decoration:none;color:#333;font-size:14px;transition:background .15s;{{ $__currentCurrCode === $curr->currency_code ? 'background:#f0f7ff;font-weight:600;color:#e86532;' : '' }}"
                                        onmouseover="this.style.background='#f5f5f5'"
                                        onmouseout="this.style.background='{{ $__currentCurrCode === $curr->currency_code ? '#f0f7ff' : 'transparent' }}'">
                                        <span style="font-size:16px;font-weight:700;width:24px;text-align:center;">{{
                                            $curr->currency_icon }}</span>
                                        <span>{{ $curr->currency_name }}</span>
                                        @if($__currentCurrCode === $curr->currency_code)
                                        <span style="margin-left:auto;color:#e86532;">✓</span>
                                        @endif
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <script>
                            (function () {
                                const btn = document.getElementById('lcDropdownBtn');
                                const menu = document.getElementById('lcDropdownMenu');
                                if (!btn || !menu) return;
                                btn.addEventListener('click', function (e) {
                                    e.stopPropagation();
                                    menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
                                });
                                document.addEventListener('click', function () { menu.style.display = 'none'; });
                                menu.addEventListener('click', function (e) { e.stopPropagation(); });
                            })();
                        </script>

                        <div class="tg-header-menu-bar lh-1 p-relative ml-20 pl-20">
                            <span class="tg-header-border d-none d-xl-block"></span>
                            <button class="tgmenu-offcanvas-open-btn menu-tigger d-none d-xl-block">
                                <span></span><span></span><span></span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="d-block d-xl-none">

    @auth('web')

    @includeIf('user.partials.mobile_bottom_nav')

    @if (!View::exists('user.partials.mobile_bottom_nav'))
    <nav class="app-bottom-bar" role="navigation" aria-label="Bottom navigation">
        <a class="app-nav-item"
            href="{{ Auth::guard('web')->user()->is_seller == 1 ? route('agency.dashboard') : route('user.dashboard') }}">
            <span class="ico"><i class="fas fa-home"></i></span>
            <span class="lbl">Dashboard</span>
        </a>
        <a class="app-nav-item" href="{{ route('user.bookings') }}">
            <span class="ico"><i class="fas fa-clipboard-list"></i></span>
            <span class="lbl">Bookings</span>
        </a>
        <a class="app-nav-item" href="{{ route('home') }}">
            <span class="ico"><i class="fas fa-globe"></i></span>
            <span class="lbl">Home</span>
        </a>
        <a class="app-nav-item" href="{{ route('user.profile') }}">
            <span class="ico"><i class="fas fa-user"></i></span>
            <span class="lbl">Profile</span>
        </a>
    </nav>
    @endif
    @else
    <nav class="app-bottom-bar" role="navigation" aria-label="Bottom navigation">
        <a class="app-nav-item {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
            <span class="ico"><i class="fas fa-home"></i></span>
            <span class="lbl">Home</span>
        </a>

        <a class="app-nav-item {{ request()->routeIs('front.tourbooking.services') ? 'active' : '' }}"
            href="{{ route('front.tourbooking.services') }}">
            <span class="ico"><i class="fas fa-clipboard-list"></i></span>
            <span class="lbl">Trips</span>
        </a>

        <a class="app-nav-item {{ request()->routeIs('user.login') ? 'active' : '' }}" href="{{ route('user.login') }}">
            <span class="ico"><i class="fas fa-sign-in-alt"></i></span>
            <span class="lbl">Login</span>
        </a>
    </nav>
    @endauth

</div>