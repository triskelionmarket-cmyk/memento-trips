{{-- resources/views/admin/partials/mobile_bottom_nav.blade.php --}}

@php
use Illuminate\Support\Facades\Route;

$auth_admin = Auth::guard('admin')->user();

$r = function(string $name, string $fallback){
return Route::has($name) ? route($name) : url($fallback);
};

// Main bottom tabs
$adminDashboardUrl = $r('admin.dashboard', '/admin/dashboard');
$bookingsUrl = Route::has('admin.tourbooking.bookings.index')
? route('admin.tourbooking.bookings.index')
: url('/admin/tourbooking/bookings');
$servicesUrl = Route::has('admin.tourbooking.services.index')
? route('admin.tourbooking.services.index')
: url('/admin/tourbooking/services');
$homeUrl = Route::has('home') ? route('home') : url('/');

// Sheet links
$editProfileUrl = $r('admin.edit-profile', '/admin/edit-profile');
$settingsUrl = $r('admin.general-setting', '/admin/general-setting');
$sellerListUrl = $r('admin.seller-list', '/admin/seller-list');
$userListUrl = $r('admin.user-list', '/admin/user-list');
$supportTicketsUrl = Route::has('admin.support-tickets') ? route('admin.support-tickets') : null;
$contactMsgUrl = Route::has('admin.contact-message') ? route('admin.contact-message') : null;

// Active states
$isActiveDashboard = request()->routeIs('admin.dashboard');
$isActiveBookings = request()->routeIs('admin.tourbooking.bookings.*');
$isActiveServices = request()->routeIs('admin.tourbooking.services.*');
@endphp

<div class="app-nav-mobile d-lg-none">
    <div class="app-nav-backdrop" data-app-sheet-close></div>

    <div class="app-nav-sheet" id="appNavSheet" aria-hidden="true">
        <div class="app-nav-sheet__header">
            <div class="app-nav-user">
                <div class="app-nav-user__avatar">
                    <img src="{{ $auth_admin?->image ? asset($auth_admin->image) : asset($general_setting->default_avatar) }}"
                        alt="Admin">
                </div>
                <div class="app-nav-user__meta">
                    <div class="app-nav-user__name">{{ $auth_admin?->name ?? '—' }}</div>
                    <div class="app-nav-user__email">{{ $auth_admin?->email ?? '' }}</div>
                </div>
            </div>

            <button type="button" class="app-nav-sheet__close" data-app-sheet-close aria-label="Close menu">
                <span>×</span>
            </button>
        </div>

        <div class="app-nav-sheet__content">
            <div class="app-nav-grid">
                <a class="app-nav-card" href="{{ $editProfileUrl }}">
                    <span class="app-nav-card__ico"><i class="fas fa-user"></i></span>
                    <span class="app-nav-card__txt">{{ __('translate.Edit Profile') }}</span>
                </a>

                <a class="app-nav-card" href="{{ $settingsUrl }}">
                    <span class="app-nav-card__ico"><i class="fas fa-cog"></i></span>
                    <span class="app-nav-card__txt">{{ __('translate.Settings') }}</span>
                </a>

                <a class="app-nav-card" href="{{ $sellerListUrl }}">
                    <span class="app-nav-card__ico"><i class="fas fa-building"></i></span>
                    <span class="app-nav-card__txt">{{ __('translate.Agency List') }}</span>
                </a>

                <a class="app-nav-card" href="{{ $userListUrl }}">
                    <span class="app-nav-card__ico"><i class="fas fa-users"></i></span>
                    <span class="app-nav-card__txt">{{ __('translate.User List') }}</span>
                </a>

                @if($supportTicketsUrl)
                <a class="app-nav-card" href="{{ $supportTicketsUrl }}">
                    <span class="app-nav-card__ico"><i class="fas fa-headset"></i></span>
                    <span class="app-nav-card__txt">{{ __('translate.Support Ticket') }}</span>
                </a>
                @endif

                @if($contactMsgUrl)
                <a class="app-nav-card" href="{{ $contactMsgUrl }}">
                    <span class="app-nav-card__ico"><i class="fas fa-envelope"></i></span>
                    <span class="app-nav-card__txt">{{ __('translate.Contact Message') }}</span>
                </a>
                @endif

                <a class="app-nav-card app-nav-card--danger" href="javascript:;"
                    onclick="event.preventDefault(); document.getElementById('admin-mobile-logout').submit();">
                    <span class="app-nav-card__ico"><i class="fas fa-sign-out-alt"></i></span>
                    <span class="app-nav-card__txt">{{ __('translate.Logout') }}</span>
                </a>
            </div>

            <div class="app-nav-sheet__footer">
                <a class="app-nav-wide" href="{{ $homeUrl }}">
                    <i class="fas fa-globe"></i> {{ __('translate.Visit Website') }}
                </a>
            </div>
        </div>
    </div>

    <nav class="app-bottom-bar" aria-label="Bottom Navigation">
        <a class="app-bottom-item {{ $isActiveDashboard ? 'is-active' : '' }}" href="{{ $adminDashboardUrl }}">
            <span class="app-bottom-ico"><i class="fas fa-home"></i></span>
            <span class="app-bottom-txt">{{ __('translate.Dashboard') }}</span>
        </a>

        <a class="app-bottom-item {{ $isActiveBookings ? 'is-active' : '' }}" href="{{ $bookingsUrl }}">
            <span class="app-bottom-ico"><i class="fas fa-receipt"></i></span>
            <span class="app-bottom-txt">{{ __('translate.Bookings') }}</span>
        </a>

        <a class="app-bottom-item {{ $isActiveServices ? 'is-active' : '' }}" href="{{ $servicesUrl }}">
            <span class="app-bottom-ico"><i class="fas fa-suitcase"></i></span>
            <span class="app-bottom-txt">{{ __('translate.Services') }}</span>
        </a>

        <a class="app-bottom-item" href="{{ $homeUrl }}">
            <span class="app-bottom-ico"><i class="fas fa-globe"></i></span>
            <span class="app-bottom-txt">{{ __('translate.Home') }}</span>
        </a>

        <button type="button" class="app-bottom-item app-bottom-item--btn" data-app-sheet-open
            aria-controls="appNavSheet" aria-expanded="false">
            <span class="app-bottom-ico"><i class="fas fa-user-circle"></i></span>
            <span class="app-bottom-txt">{{ __('translate.My Profile') }}</span>
        </button>
    </nav>
</div>

<form id="admin-mobile-logout" action="{{ route('admin.logout') }}" method="POST" class="d-none">@csrf</form>