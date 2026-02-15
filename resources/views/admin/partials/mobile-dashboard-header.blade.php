{{-- resources/views/admin/partials/mobile-dashboard-header.blade.php --}}
@php
$admin = Auth::guard('admin')->user();
$firstName = trim(explode(' ', $admin?->name ?: 'Admin')[0]);
$avatar = $admin?->image ? asset($admin->image) : asset($general_setting->default_avatar);

// URLs for shortcuts
$bookingsShortcut = Route::has('admin.tourbooking.bookings.index')
? route('admin.tourbooking.bookings.index')
: url('/admin/tourbooking/bookings');
$servicesShortcut = Route::has('admin.tourbooking.services.index')
? route('admin.tourbooking.services.index')
: url('/admin/tourbooking/services');
$agenciesShortcut = Route::has('admin.seller-list')
? route('admin.seller-list')
: url('/admin/seller-list');
$usersShortcut = Route::has('admin.user-list')
? route('admin.user-list')
: url('/admin/user-list');
@endphp

<div class="md-hero d-mobile-only">
    <div class="md-hero__top">
        <div class="md-hero__left">
            <div class="md-hero__kicker">Hi, {{ strtolower($firstName) }}
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    style="display:inline-block;vertical-align:middle;margin-left:2px;">
                    <path
                        d="M7 3.516A9.004 9.004 0 0 1 21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9c0-2.125.736-4.078 1.968-5.617"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    <path
                        d="M7.5 7.5c-.662 0-1.2.895-1.2 2s.538 2 1.2 2 1.2-.895 1.2-2-.538-2-1.2-2ZM16.5 7.5c-.662 0-1.2.895-1.2 2s.538 2 1.2 2 1.2-.895 1.2-2-.538-2-1.2-2Z"
                        fill="currentColor" />
                    <path d="M8.5 15.5s1.5 2 3.5 2 3.5-2 3.5-2" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" />
                </svg>
            </div>
            <div class="md-hero__title">Admin Panel</div>
        </div>
        <div class="md-hero__right">
            <a class="md-hero__iconbtn" href="{{ route('home') }}" target="_blank" aria-label="Open website">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <ellipse cx="12" cy="12" rx="4" ry="10" stroke="currentColor" stroke-width="1.6" />
                    <path
                        d="M21.9962 11.7205C20.1938 13.2016 16.3949 14.2222 12 14.2222C7.60511 14.2222 3.80619 13.2016 2.00383 11.7205M21.9962 11.7205C21.8482 6.32691 17.4294 2 12 2C6.57061 2 2.15183 6.32691 2.00383 11.7205M21.9962 11.7205C21.9987 11.8134 22 11.9065 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 11.9065 2.00128 11.8134 2.00383 11.7205"
                        stroke="currentColor" stroke-width="1.6" />
                </svg>
            </a>
            <a class="md-hero__avatar" href="{{ route('admin.edit-profile') }}" aria-label="My profile">
                <img src="{{ $avatar }}" alt="Profile">
            </a>
        </div>
    </div>

    <div class="md-hero__stats">
        <div class="md-stat">
            <div class="md-stat__label">{{ __('translate.Total Sale') }}</div>
            <div class="md-stat__value">{{ currency($total_income) }}</div>
        </div>
        <div class="md-stat">
            <div class="md-stat__label">{{ __('translate.Admin Earnings') }}</div>
            <div class="md-stat__value">{{ currency($total_commission) }}</div>
        </div>
        <div class="md-stat">
            <div class="md-stat__label">{{ __('translate.Seller Earnings') }}</div>
            <div class="md-stat__value">{{ currency($net_income) }}</div>
        </div>
        <div class="md-stat">
            <div class="md-stat__label">{{ __('translate.Total Sold') }}</div>
            <div class="md-stat__value">{{ $total_sold }}</div>
        </div>
    </div>

    <div class="md-hero__shortcuts">
        <a class="md-chip" href="{{ $bookingsShortcut }}">
            <span class="md-chip__ico">
                <svg viewBox="0 0 24 24" fill="none">
                    <path d="M4 6h16M4 6c0-1.1.9-2 2-2h12c1.1 0 2 .9 2 2M4 6v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V6"
                        stroke="currentColor" stroke-width="2" />
                    <path d="M9 4v4M15 4v4M7 12h10M7 16h6" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" />
                </svg>
            </span>
            <span class="md-chip__txt">{{ __('translate.Bookings') }}</span>
        </a>
        <a class="md-chip" href="{{ $servicesShortcut }}">
            <span class="md-chip__ico">
                <svg viewBox="0 0 24 24" fill="none">
                    <path
                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l5.553 2.776A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            <span class="md-chip__txt">{{ __('translate.Services') }}</span>
        </a>
        <a class="md-chip" href="{{ $agenciesShortcut }}">
            <span class="md-chip__ico">
                <svg viewBox="0 0 24 24" fill="none">
                    <path d="M3 21h18M5 21V7l8-4v18M13 21V11l6-2v12M9 9v.01M9 12v.01M9 15v.01M9 18v.01"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            <span class="md-chip__txt">{{ __('translate.Agencies') }}</span>
        </a>
        <a class="md-chip md-chip--accent" href="{{ $usersShortcut }}">
            <span class="md-chip__ico">
                <svg viewBox="0 0 24 24" fill="none">
                    <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2" />
                    <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            <span class="md-chip__txt">{{ __('translate.Users') }}</span>
        </a>
    </div>
</div>