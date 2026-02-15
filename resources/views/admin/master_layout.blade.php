<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  @yield('title')

  <link rel="icon" href="{{ asset($general_setting->favicon) }}">


  <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('global/datatable/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/css/slick.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/css/font-awesome-all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/css/nice-select.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/css/enrollment.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/css/overview.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/css/dev.css') }}">
  <link rel="stylesheet" href="{{ asset('global/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}">

  @stack('style_section')

  <style>
    :root {
      --pt-sb-open: 300px;
      --sbw: var(--pt-sb-open);
      --pt-brand: var(--theme-color, #ff4200);
      --pt-ink: #2a2f3a;
      --pt-bg: #fff;
      --pt-sep: #eef0f4;
    }

    body.sb-closed {
      --sbw: 0px;
    }

    /* ===== Sidebar ===== */
    .crancy-smenu {
      position: fixed;
      inset: 0 auto 0 0;
      width: var(--sbw);
      overflow: hidden;
      transition: width .22s ease;
      z-index: 1040;
      background: #fff;
      border-right: 1px solid var(--pt-sep);
      transform: none !important;
    }

    body.sb-closed .crancy-smenu {
      border-right: 0;
    }

    .admin-menu a {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px 14px;
    }

    .crancy-menu-icon {
      flex: 0 0 22px;
      display: grid;
      place-items: center;
    }

    .menu-bar__name {
      flex: 1 1 auto;
      min-width: 0;
      white-space: nowrap;
      text-overflow: ellipsis;
      overflow: hidden;
    }

    /* ===== Header ===== */
    .pt-header {
      position: sticky;
      top: 0;
      z-index: 1020;
      background: var(--pt-bg);
      border-bottom: 1px solid var(--pt-sep);
      margin-left: var(--sbw);
      width: calc(100% - var(--sbw));
      transition: margin-left .22s ease, width .22s ease;
    }

    .pt-header>.container {
      max-width: 100% !important;
      padding-left: 0 !important;
      padding-right: 0 !important;
    }

    .pt-headbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      padding: 10px 16px;
    }

    .pt-left {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .pt-title {
      font-weight: 700;
      color: var(--pt-ink);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    #ptHeaderToggle {
      display: inline-grid;
      place-items: center;
      width: 42px;
      height: 42px;
      border-radius: 12px;
      border: 1px solid var(--pt-sep);
      background: #fff;
      box-shadow: 0 1px 0 rgba(0, 0, 0, .02);
      cursor: pointer;
      transition: .2s;
    }

    #ptHeaderToggle:hover {
      background: #f9f8ff;
    }

    #ptHeaderToggle svg {
      width: 18px;
      height: 18px;
      color: var(--pt-brand);
      transition: transform .2s;
    }

    body.sb-closed #ptHeaderToggle svg {
      transform: rotate(180deg);
    }

    .pt-actions {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .pt-cluster {
      display: flex;
      align-items: center;
      gap: 6px;
      padding: 4px;
      border: 1px solid var(--pt-sep);
      background: #fff;
      border-radius: 14px;
      box-shadow: 0 1px 0 rgba(0, 0, 0, .02);
    }

    .pt-ctl {
      display: inline-grid;
      place-items: center;
      width: 38px;
      height: 38px;
      border-radius: 10px;
      border: 1px solid transparent;
      transition: .15s;
      background: #fafbff;
    }

    .pt-ctl:hover {
      border-color: #ffd7c6;
      background: #fff;
    }

    .pt-ctl svg {
      width: 20px;
      height: 20px;
      color: var(--pt-brand);
    }

    .pt-sep-v {
      width: 1px;
      height: 24px;
      background: var(--pt-sep);
      margin: 0 2px;
      border-radius: 1px;
    }

    .pt-account {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .pt-avatar {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      overflow: hidden;
      border: 2px solid var(--pt-sep);
      box-shadow: 0 1px 0 rgba(0, 0, 0, .02);
    }

    .pt-avatar img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }


    .crancy-body-area {
      margin-left: 0 !important;
      padding-left: 0 !important;
    }

    #ptPage {
      margin-left: var(--sbw);
      transition: margin-left .22s ease;
    }


    #ptPage,
    #ptPage .crancy-main,
    #ptPage .crancy-content,
    #ptPage .crancy-header__inner,
    #ptPage .crancy-header__middle,
    #ptPage .crancy-main__content,
    #ptPage .crancy-wrapper {
      padding-left: 0 !important;
      margin-left: 0 !important;
      border-left: 0 !important;
      box-shadow: none !important;
    }

    #ptPage .container,
    #ptPage .container-fluid {
      max-width: 100% !important;
      padding-left: 0 !important;
      padding-right: 0 !important;
      margin-left: 0 !important;
    }

    #ptPage .row {
      margin-left: 0 !important;
    }

    .pt-normalize>*:first-child {
      margin-top: 0 !important;
    }

      {
        {
        -- ═══════ Mobile App Mode ═══════ --
      }
    }

    @media (max-width: 991.98px) {
      :root {
        --app-accent: #ff4200;
        --app-text: #0f172a;
        --app-muted: #64748b;
        --app-bg: #fff;
        --app-border: rgba(15, 23, 42, .10);
        --app-shadow: 0 -12px 30px rgba(15, 23, 42, .10);
        --app-radius: 18px;
        --app-bar-h: 68px;
      }

      body {
        --sbw: 0px;
      }

      /* hide desktop sidebar & header on mobile */
      .crancy-smenu {
        display: none !important;
      }

      .pt-header {
        display: none !important;
      }

      #ptPage {
        margin-left: 0 !important;
        padding-bottom: calc(var(--app-bar-h) + env(safe-area-inset-bottom, 0px) + 12px);
      }

      /* tighter mobile padding */
      .crancy-adashboard .container,
      .crancy-adashboard .container__bscreen {
        padding-left: 16px !important;
        padding-right: 16px !important;
      }

      /* ── Bottom Bar ── */
      .app-bottom-bar {
        position: fixed;
        left: 0;
        right: 0;
        bottom: 0;
        height: calc(var(--app-bar-h) + env(safe-area-inset-bottom, 0px));
        padding: 10px 10px calc(10px + env(safe-area-inset-bottom, 0px));
        background: var(--app-bg);
        border-top: 1px solid var(--app-border);
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 6px;
        z-index: 9999;
      }

      .app-bottom-item {
        border: 0;
        background: transparent;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 6px;
        text-decoration: none !important;
        color: var(--app-muted) !important;
        font-weight: 700;
        padding: 8px 6px;
        border-radius: 14px;
        line-height: 1;
      }

      .app-bottom-item--btn {
        cursor: pointer;
      }

      .app-bottom-ico {
        width: 36px;
        height: 26px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: currentColor;
      }

      .app-bottom-txt {
        font-size: 11px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100%;
      }

      .app-bottom-item.is-active {
        color: var(--app-accent) !important;
        background: rgba(255, 66, 0, .08);
      }

      /* ── Backdrop ── */
      .app-nav-backdrop {
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, .35);
        opacity: 0;
        pointer-events: none;
        transition: opacity .18s ease;
        z-index: 9997;
      }

      /* ── Slide-Up Sheet ── */
      .app-nav-sheet {
        position: fixed;
        left: 12px;
        right: 12px;
        bottom: calc(var(--app-bar-h) + env(safe-area-inset-bottom, 0px) + 10px);
        background: var(--app-bg);
        border: 1px solid var(--app-border);
        box-shadow: var(--app-shadow);
        border-radius: var(--app-radius);
        transform: translateY(18px);
        opacity: 0;
        pointer-events: none;
        transition: transform .18s ease, opacity .18s ease;
        z-index: 9998;
        max-height: min(62vh, 520px);
        overflow: hidden;
      }

      .app-nav-sheet__header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 14px 14px 10px;
        border-bottom: 1px solid var(--app-border);
      }

      .app-nav-user {
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 0;
      }

      .app-nav-user__avatar {
        width: 44px;
        height: 44px;
        border-radius: 999px;
        overflow: hidden;
        flex: 0 0 auto;
        border: 1px solid var(--app-border);
        background: #f8fafc;
      }

      .app-nav-user__avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
      }

      .app-nav-user__meta {
        min-width: 0;
      }

      .app-nav-user__name {
        font-size: 14px;
        font-weight: 800;
        color: var(--app-text);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }

      .app-nav-user__email {
        font-size: 12px;
        color: var(--app-muted);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }

      .app-nav-sheet__close {
        width: 40px;
        height: 40px;
        border-radius: 14px;
        border: 1px solid var(--app-border);
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        line-height: 1;
        color: var(--app-text);
      }

      .app-nav-sheet__content {
        padding: 12px;
        overflow: auto;
        -webkit-overflow-scrolling: touch;
      }

      /* ── Card Grid ── */
      .app-nav-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 10px;
      }

      .app-nav-card {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px;
        border-radius: 14px;
        border: 1px solid var(--app-border);
        background: #fff;
        text-decoration: none !important;
        color: var(--app-text) !important;
        font-weight: 700;
        min-height: 48px;
      }

      .app-nav-card__ico {
        width: 36px;
        height: 36px;
        border-radius: 12px;
        background: rgba(255, 66, 0, .10);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--app-accent);
        flex: 0 0 auto;
      }

      .app-nav-card__txt {
        font-size: 13px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }

      .app-nav-card--danger .app-nav-card__ico {
        background: rgba(220, 38, 38, .10);
        color: #dc2626;
      }

      .app-nav-sheet__footer {
        margin-top: 10px;
        padding-top: 10px;
        border-top: 1px solid var(--app-border);
      }

      .app-nav-wide {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 12px;
        border-radius: 14px;
        border: 1px solid var(--app-border);
        background: rgba(255, 66, 0, .08);
        color: var(--app-accent) !important;
        font-weight: 800;
        text-decoration: none !important;
      }

      /* ── Open States ── */
      body.app-nav-open .app-nav-backdrop {
        opacity: 1;
        pointer-events: auto;
      }

      body.app-nav-open .app-nav-sheet {
        opacity: 1;
        pointer-events: auto;
        transform: translateY(0);
      }

      /* ── Mobile Hero Header ── */
      .md-hero {
        padding: 20px 16px 14px;
        background: linear-gradient(135deg, #ff4200 0%, #ff6b3d 100%);
        color: #fff;
      }

      .md-hero__top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 18px;
      }

      .md-hero__kicker {
        font-size: 14px;
        opacity: .85;
        font-weight: 600;
      }

      .md-hero__title {
        font-size: 22px;
        font-weight: 800;
        letter-spacing: -.3px;
        margin-top: 2px;
      }

      .md-hero__right {
        display: flex;
        align-items: center;
        gap: 10px;
      }

      .md-hero__iconbtn {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: rgba(255, 255, 255, .18);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff !important;
        text-decoration: none !important;
      }

      .md-hero__avatar {
        width: 40px;
        height: 40px;
        border-radius: 999px;
        overflow: hidden;
        border: 2px solid rgba(255, 255, 255, .5);
      }

      .md-hero__avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
      }

      .md-hero__stats {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
        margin-bottom: 14px;
      }

      .md-stat {
        background: rgba(255, 255, 255, .14);
        border-radius: 14px;
        padding: 12px;
      }

      .md-stat__label {
        font-size: 11px;
        opacity: .75;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .3px;
      }

      .md-stat__value {
        font-size: 20px;
        font-weight: 800;
        margin-top: 2px;
      }

      .md-hero__shortcuts {
        display: flex;
        gap: 8px;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        padding-bottom: 2px;
      }

      .md-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 14px;
        border-radius: 999px;
        background: rgba(255, 255, 255, .18);
        color: #fff !important;
        text-decoration: none !important;
        font-size: 13px;
        font-weight: 700;
        white-space: nowrap;
        flex: 0 0 auto;
      }

      .md-chip__ico {
        width: 18px;
        height: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .md-chip__ico svg {
        width: 100%;
        height: 100%;
      }

      .md-chip--accent {
        background: rgba(255, 255, 255, .32);
      }

      /* ── Mobile page header ── */
      .mob-page-header {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 16px;
        background: var(--app-bg);
        border-bottom: 1px solid var(--app-border);
        position: sticky;
        top: 0;
        z-index: 100;
      }

      .mob-page-header__back {
        width: 38px;
        height: 38px;
        border-radius: 12px;
        border: 1px solid var(--app-border);
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--app-text);
        text-decoration: none !important;
      }

      .mob-page-header__title {
        font-size: 17px;
        font-weight: 800;
        color: var(--app-text);
      }

      /* ── Mobile card list (for DataTable replacements) ── */
      .mob-card-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding: 12px 16px;
      }

      .mob-card {
        border: 1px solid var(--app-border);
        border-radius: 16px;
        padding: 14px;
        background: #fff;
      }

      .mob-card__row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
      }

      .mob-card__row+.mob-card__row {
        margin-top: 8px;
        padding-top: 8px;
        border-top: 1px solid rgba(0, 0, 0, .05);
      }

      .mob-card__label {
        font-size: 12px;
        color: var(--app-muted);
        font-weight: 600;
      }

      .mob-card__value {
        font-size: 14px;
        font-weight: 700;
        color: var(--app-text);
        text-align: right;
      }

      .mob-card__title {
        font-size: 15px;
        font-weight: 800;
        color: var(--app-text);
        margin-bottom: 6px;
      }

      .mob-card__badge {
        display: inline-flex;
        padding: 4px 10px;
        border-radius: 8px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .3px;
      }

      .mob-card__badge--success {
        background: rgba(34, 197, 94, .12);
        color: #16a34a;
      }

      .mob-card__badge--warning {
        background: rgba(251, 191, 36, .12);
        color: #d97706;
      }

      .mob-card__badge--danger {
        background: rgba(239, 68, 68, .12);
        color: #dc2626;
      }

      .mob-card__badge--info {
        background: rgba(59, 130, 246, .12);
        color: #2563eb;
      }

      .mob-card__thumb {
        width: 56px;
        height: 56px;
        border-radius: 12px;
        overflow: hidden;
        flex: 0 0 auto;
      }

      .mob-card__thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
      }

      .mob-card__avatar {
        width: 40px;
        height: 40px;
        border-radius: 999px;
        overflow: hidden;
        flex: 0 0 auto;
        border: 1px solid var(--app-border);
      }

      .mob-card__avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
      }

      .mob-card__actions {
        display: flex;
        gap: 8px;
        margin-top: 10px;
      }

      .mob-card__btn {
        flex: 1;
        padding: 8px;
        border-radius: 10px;
        border: 1px solid var(--app-border);
        background: #fff;
        font-size: 12px;
        font-weight: 700;
        text-align: center;
        color: var(--app-text);
        text-decoration: none !important;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
      }

      .mob-card__btn--primary {
        background: var(--app-accent);
        color: #fff !important;
        border-color: var(--app-accent);
      }

      .mob-card__btn--danger {
        color: #dc2626 !important;
        border-color: rgba(220, 38, 38, .2);
      }

      /* Hide desktop elements on mobile */
      .d-mobile-none {
        display: none !important;
      }
    }

    /* Show only on mobile */
    .d-mobile-only {
      display: none;
    }

    @media (max-width: 991.98px) {
      .d-mobile-only {
        display: block !important;
      }

      .d-mobile-flex {
        display: flex !important;
      }

      .d-desktop-only {
        display: none !important;
      }
    }

    html,
    body {
      overflow-x: hidden;
    }

    /* starea închis */
    body.sb-closed .crancy-smenu {
      width: 0 !important;
      border-right: 0 !important;
      box-shadow: none !important;
      pointer-events: none !important;
    }

    body.sb-closed .pt-header {
      margin-left: 0 !important;
      width: 100% !important;
    }

    body.sb-closed #ptPage {
      margin-left: 0 !important;
    }

    body.sb-closed #ptPage .container,
    body.sb-closed #ptPage .container-fluid,
    body.sb-closed #ptPage .crancy-main,
    body.sb-closed #ptPage .crancy-content,
    body.sb-closed #ptPage .crancy-wrapper {
      padding-left: 0 !important;
      margin-left: 0 !important;
      border-left: 0 !important;
    }

    /* fallback anti-gutter */
    body.sb-closed #ptPage,
    body.sb-closed #ptPage .crancy-header__inner,
    body.sb-closed #ptPage .crancy-header__middle {
      padding-left: 0 !important;
      margin-left: 0 !important;
      border-left: 0 !important;
    }

    body.sb-closed #ptPage>*,
    body.sb-closed #ptPage>*>* {
      padding-left: 0 !important;
      margin-left: 0 !important;
      border-left: 0 !important;
    }
  </style>
</head>

<body id="crancy-dark-light">
  <div class="crancy-body-area">

    <!-- ===== Sidebar ===== -->
    <div class="crancy-smenu" id="CrancyMenu">
      <div class="admin-menu">
        <div class="logo crancy-sidebar-padding pd-right-0">
          <a class="crancy-logo" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset($general_setting->secondary_logo) }}" alt="logo" style="height:38px;">
          </a>
        </div>
        @include('admin.sidebar')
      </div>
    </div>

    <!-- ===== Header ===== -->
    <header class="pt-header">
      <div class="container">
        <div class="pt-headbar">
          <div class="pt-left">
            <button id="ptHeaderToggle" type="button" aria-label="Toggle sidebar" aria-pressed="false"
              title="Toggle sidebar">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M15 6l-6 6 6 6" />
              </svg>
            </button>
            <div class="pt-title">@yield('body-header')</div>
          </div>

          <div class="pt-actions">
            <div class="pt-cluster">
              <a target="_blank" class="pt-ctl" href="{{ route('home') }}" title="Open site">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                  <circle cx="12" cy="12" r="10"></circle>
                  <path d="M2 12h20M12 2a15 15 0 0 1 0 20M12 2a15 15 0 0 0 0 20"></path>
                </svg>
              </a>
              <span class="pt-sep-v"></span>
              <a class="pt-ctl" href="{{ route('admin.contact-message') }}" title="Messages">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                  <path d="M21 15a4 4 0 0 1-4 4H8l-5 3V6a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z" />
                </svg>
              </a>
              <span class="pt-sep-v"></span>
              <a class="pt-ctl" href="{{ route('admin.general-setting') }}" title="Settings">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                  <path d="M12 15.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z" />
                  <path
                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06A1.65 1.65 0 0 0 15 19.4a1.65 1.65 0 0 0-1 .6 1.65 1.65 0 0 0-.33 1.82l.03.06a2 2 0 1 1-3.4 0l.03-.06A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82-.33l-.06.03a2 2 0 1 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.6 15 1.65 1.65 0 0 0 4 14" />
                </svg>
              </a>
              <span class="pt-sep-v"></span>
              {{-- Language & Currency Dropdown --}}
              @php
              $__languages = \Modules\Language\App\Models\Language::where('status', 1)->get();
              $__currencies = \Modules\Currency\App\Models\Currency::where('status', 'active')->get();
              $__currentLang = session('front_lang', 'en');
              $__currentCurrIcon = session('currency_icon', '€');
              $__currentCurrCode = session('currency_code', 'EUR');
              $__flagMap = ['en' => '🇬🇧', 'pl' => '🇵🇱', 'ro' => '🇷🇴', 'de' => '🇩🇪', 'fr' => '🇫🇷', 'es' =>
              '🇪🇸', 'it' => '🇮🇹'];
              $__currentFlag = $__flagMap[$__currentLang] ?? '🌐';
              @endphp
              <div style="position:relative;">
                <button type="button" class="pt-ctl" id="lcDropdownBtn" title="Language & Currency"
                  style="width:auto;padding:0 10px;gap:4px;display:inline-flex;font-size:13px;font-weight:600;color:var(--pt-ink);">
                  <span style="font-size:15px;">{{ $__currentFlag }}</span>
                  <span>{{ $__currentCurrIcon }}</span>
                  <svg width="8" height="5" viewBox="0 0 10 6" fill="none" style="margin-left:1px;">
                    <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </button>
                <div id="lcDropdownMenu"
                  style="display:none;position:absolute;top:calc(100% + 8px);right:0;background:#fff;border-radius:12px;box-shadow:0 8px 30px rgba(0,0,0,.12);min-width:220px;z-index:9999;overflow:hidden;">
                  <div style="padding:14px 16px 8px;">
                    <div
                      style="font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.5px;color:#888;margin-bottom:8px;">
                      🌐 {{ __('translate.Language') }}</div>
                    @foreach($__languages as $lang)
                    <a href="{{ route('language-switcher', ['lang_code' => $lang->lang_code]) }}"
                      style="display:flex;align-items:center;gap:8px;padding:8px 10px;border-radius:8px;text-decoration:none;color:#333;font-size:14px;transition:background .15s;{{ $__currentLang === $lang->lang_code ? 'background:#f0f7ff;font-weight:600;color:#e86532;' : '' }}"
                      onmouseover="this.style.background='#f5f5f5'"
                      onmouseout="this.style.background='{{ $__currentLang === $lang->lang_code ? '#f0f7ff' : 'transparent' }}'">
                      <span style="font-size:18px;">{{ $__flagMap[$lang->lang_code] ?? '🌐' }}</span>
                      <span>{{ $lang->lang_name }}</span>
                      @if($__currentLang === $lang->lang_code)<span
                        style="margin-left:auto;color:#e86532;">✓</span>@endif
                    </a>
                    @endforeach
                  </div>
                  <div style="height:1px;background:#eee;margin:4px 16px;"></div>
                  <div style="padding:8px 16px 14px;">
                    <div
                      style="font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.5px;color:#888;margin-bottom:8px;">
                      💱 {{ __('translate.Currency') }}</div>
                    @foreach($__currencies as $curr)
                    <a href="{{ route('currency-switcher', ['currency_code' => $curr->currency_code]) }}"
                      style="display:flex;align-items:center;gap:8px;padding:8px 10px;border-radius:8px;text-decoration:none;color:#333;font-size:14px;transition:background .15s;{{ $__currentCurrCode === $curr->currency_code ? 'background:#f0f7ff;font-weight:600;color:#e86532;' : '' }}"
                      onmouseover="this.style.background='#f5f5f5'"
                      onmouseout="this.style.background='{{ $__currentCurrCode === $curr->currency_code ? '#f0f7ff' : 'transparent' }}'">
                      <span style="font-size:16px;font-weight:700;width:24px;text-align:center;">{{ $curr->currency_icon
                        }}</span>
                      <span>{{ $curr->currency_name }}</span>
                      @if($__currentCurrCode === $curr->currency_code)<span
                        style="margin-left:auto;color:#e86532;">✓</span>@endif
                    </a>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>

            @php $auth_admin = Auth::guard('admin')->user(); @endphp
            <div class="pt-account">
              <a href="{{ route('admin.edit-profile') }}" class="pt-avatar">
                @if ($auth_admin?->image)
                <img src="{{ asset($auth_admin?->image) }}" alt="#">
                @else
                <img src="{{ asset($general_setting->default_avatar) }}" alt="#">
                @endif
              </a>

              <div class="crancy-dropdown crancy-dropdown--acount">
                <div class="crancy-dropdown__hover--inner">
                  <ul class="crancy-dmenu">
                    <li>
                      <a href="{{ route('admin.edit-profile') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                          <path
                            d="M12.1202 12.78C12.0502 12.77 11.9602 12.77 11.8802 12.78C10.1202 12.72 8.72021 11.28 8.72021 9.50998C8.72021 7.69998 10.1802 6.22998 12.0002 6.22998C13.8102 6.22998 15.2802 7.69998 15.2802 9.50998C15.2702 11.28 13.8802 12.72 12.1202 12.78Z"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                          <path
                            d="M18.7398 19.3801C16.9598 21.0101 14.5998 22.0001 11.9998 22.0001C9.39977 22.0001 7.03977 21.0101 5.25977 19.3801C5.35977 18.4401 5.95977 17.5201 7.02977 16.8001C9.76977 14.9801 14.2498 14.9801 16.9698 16.8001C18.0398 17.5201 18.6398 18.4401 18.7398 19.3801Z"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                          <path
                            d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        {{ __('translate.My Profile') }}
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('admin.logout') }}"
                        onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                          <path
                            d="M15 10L13.7071 11.2929C13.3166 11.6834 13.3166 12.3166 13.7071 12.7071L15 14M14 12L22 12M6 20C3.79086 20 2 18.2091 2 16V8C2 5.79086 3.79086 4 6 4M6 20C8.20914 20 10 18.2091 10 16V8C10 5.79086 8.20914 4 6 4M6 20H14C16.2091 20 18 18.2091 18 16M6 4H14C16.2091 4 18 5.79086 18 8"
                            stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        {{ __('translate.Logout') }}
                      </a>
                      <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf</form>
                    </li>
                  </ul>
                </div>
              </div>
            </div><!-- /.pt-account -->
          </div><!-- /.pt-actions -->
        </div><!-- /.pt-headbar -->
      </div>
    </header>

    <!-- ===== Conținut ===== -->
    <main id="ptPage" class="pt-normalize">
      @yield('body-content')
    </main>

    {{-- Mobile Bottom Navigation --}}
    @include('admin.partials.mobile_bottom_nav')

  </div>

  <!-- JS -->
  <script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>
  <script src="{{ asset('global/datatable/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('global/datatable/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('backend/js/jquery-migrate.js') }}"></script>
  <script src="{{ asset('backend/js/popper.min.js') }}"></script>
  <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('backend/js/nice-select.min.js') }}"></script>
  <script src="{{ asset('backend/js/main.js') }}"></script>
  <script src="{{ asset('global/toastr/toastr.min.js') }}"></script>

  <script>
    (function ($) {
      "use strict";

      const body = document.body;
      const btn = document.getElementById('ptHeaderToggle');


      (function purgeLegacy() {
        ['sidebar-close', 'sidebar-collapsed', 'menu-close', 'menu-collapsed', 'crancy-close', 'crancy-menu-close', 'admin-menu-close']
          .forEach(c => body.classList.remove(c));
        const sb = document.getElementById('CrancyMenu');
        if (sb) {
          sb.style.removeProperty('width');
          sb.style.removeProperty('transform');
          sb.style.removeProperty('display');
        }
      })();


      try {
        const savedClosed = localStorage.getItem('sb-closed') === '1';
        body.classList.toggle('sb-closed', savedClosed);
        if (btn) btn.setAttribute('aria-pressed', savedClosed ? 'true' : 'false');
      } catch (e) { }

      function toggleSidebar() {
        body.classList.toggle('sb-closed');
        const closed = body.classList.contains('sb-closed');
        try { localStorage.setItem('sb-closed', closed ? '1' : '0'); } catch (e) { }
        if (btn) btn.setAttribute('aria-pressed', closed ? 'true' : 'false');
      }

      if (btn) {
        btn.addEventListener('click', toggleSidebar);
        btn.addEventListener('keydown', (ev) => { if (ev.key === 'Enter' || ev.key === ' ') { ev.preventDefault(); toggleSidebar(); } });
      }


      $(document).ready(function () {
        const session_notify_message = @json(Session:: get('message'));
        if (session_notify_message != null) {
          const session_notify_type = @json(Session:: get('alert-type', 'info'));
          switch (session_notify_type) {
            case 'info': toastr.info(session_notify_message); break;
            case 'success': toastr.success(session_notify_message); break;
            case 'warning': toastr.warning(session_notifmesak;
            case 'error': toastr.error(session_notify_message); break;
          }
        }
        const validation_errors = @json($errors -> all());
        if (validation_errors.length > 0) validation_errors.forEach(e => toastr.error(e));

        const session_success = `{{ Session::get('success') }}`;
        const session_error = `{{ Session::get('error') }}`;
        if (session_success) toastr.success(session_success);
        if (session_err) tr(session_erro r) ;

        $('#dataTable').DataTable({ order: [] });
      });
    })(jQuery);
  </script>


  <script>
    (functio n ()  {
      var b = document.getElementById('lcDropd ow nBtn'), m = document.getElementById('lcDropdownMenu');
      if (!b || !m) return;
      b.addEventListener('click', function (e) { e.stopPropagation(); m.styl e.display = m.style.display === 'none' ?  'block' : 'none'; });
      document.addEventListener ('click', function () { m.style.display = 'none'; });
      m.addEventListener('click', function (e) { e. stop Propagation(); });
    })();
  </script>

  {{-- Mobile bottom-nav sheet open/close --}}
  <script>
      (function () {
      var body = document.body;
      document.querySelectorAll('[data-app-sheet-open]').forEach(function (btn ) {
        btn.addEventListener('click',  function () {
          body.classList.add('app-nav-open');
          var sheet = doc ume nt.getElementById(btn.getAttribute('aria-cont rols') || 'appNavSheet');
          if (sheet) sheet.settribia-hidden', 'false');
          btn.setAttribute('aria-expanded', 'true');
        });
      });
      document.querySelectorAll('[data-app-sheet-close]').forEach(function (el) {
        el.addEventListener('click', function () {
          body.classList.remove('app-nav-open');
          var sheet = document.getElementById('appNavSheet');
          if (sheet) sheet.setAttribute('aria-hidden', 'true');
          document.querySelectorAll('[data-app-sheet-open]').forEach(function (b) {
            b.setAttribute('aria-expanded', 'false');
          });
        });
      });
    })();
  </script>
  @stack('js_section')
</body>

</html>