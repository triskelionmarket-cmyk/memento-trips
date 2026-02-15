# Memento Trips

Tour booking and travel agency platform. Built with Laravel 12 and organized using `nwidart/laravel-modules` for a clean modular architecture. The frontend runs through a Blade-based theme system with Vite for asset bundling.

## Requirements

- PHP 8.4+
- MySQL 8.4+
- Composer 2.x
- Node.js 22+ and npm

## Installation

Clone the repository:

```bash
git clone <repo-url> memento-trips
cd memento-trips
```

Install PHP dependencies and set up the environment file:

```bash
composer install
cp .env.example .env
php artisan key:generate
```

### Database setup

Create a MySQL database and update the `DB_*` values in your `.env` file. A full database dump is included in the repo root (`reaktive_travel.sql`) so you can import it directly instead of running migrations:

```bash
mysql -u root -p your_database_name < reaktive_travel.sql
```

If you prefer starting from scratch, you can run migrations and seeders instead:

```bash
php artisan migrate --seed
```

Then link the storage directory:

```bash
php artisan storage:link
```

### Frontend assets

The frontend uses Vite with Bootstrap 5, Sass, and Vue 3. You need to build the assets before the app will display correctly:

```bash
npm install
npm run build
```

For local development with hot-reloading:

```bash
npm run dev
```

### Starting the dev server

```bash
php artisan serve
```

The app will be available at `http://localhost:8000`.

## Project overview

### User roles

There are three user roles, each with its own dashboard:

- **Admin** — full platform management at `/admin/dashboard`. Uses the `admin` auth guard.
- **Agency** — tour operators manage their own services and bookings at `/agency/dashboard`.
- **User** — regular users can browse services, make bookings, and manage their account at `/user/dashboard`.

### Modules

All major features are organized as Laravel modules inside the `Modules/` directory:

- **TourBooking** — the core module. Handles tour services, bookings, payments, amenities, destinations, and the entire front-end service browsing experience.
- **PaymentGateway** — integrates with Stripe, PayPal, Razorpay, Mollie, Flutterwave, Paystack, Instamojo, and Bank Transfer. Most gateways are configured through the admin panel under Payment Settings; Stripe and PayPal also use `.env` keys.
- **PaymentWithdraw** — handles agency payout/withdrawal requests.
- **Blog** — blog posts and categories.
- **Page** — static CMS pages and the contact form handler.
- **GlobalSetting** — site-wide configuration (logo, favicon, footer content, etc.).
- **SupportTicket** — user help-desk ticket system.
- **EmailSetting** — SMTP configuration and email templates.
- **SeoSetting** — per-page meta tags and Open Graph settings.
- **Category** — global category taxonomy used across the platform.
- **Language** — multi-language support. Translations live in `lang/` with full English and Polish locales.
- **Currency** — multi-currency support with conversion rates.
- **FAQ** — frequently asked questions management.
- **Newsletter** — subscriber management.
- **ContactMessage** — stores contact form submissions.
- **Wishlist** — user wishlists for saved services.
- **Coupon** — discount codes for bookings.
- **Team** — team member profiles shown on the front-end.
- **Testimonial** — client reviews and testimonials.
- **Partner** — partner/sponsor logos.
- **Brand** and **Listing** — additional taxonomy and directory modules.
- **EventCalendar** — calendar-based event management.

### Theme system

The front-end theme lives in `Cms/themes/theme1/` and includes its own controllers, views, routes, and assets. You can manage themes with artisan commands:

```bash
php artisan theme:list
php artisan theme:activate theme1
```

### File structure at a glance

```
app/                         Core application code (controllers, models, middleware, helpers)
Modules/                     All feature modules (TourBooking, PaymentGateway, Blog, etc.)
Cms/themes/theme1/           Active front-end theme (Blade views, routes, assets)
resources/views/             Admin, agency, and user panel views
public/frontend/assets/      Front-end CSS, JS, and images
public/backend/              Admin panel assets
public/global/               Shared vendor libraries (jQuery, Toastr, DataTables, etc.)
lang/                        Translation files (en, pl)
```

## Dependencies

Key PHP packages:

- `nwidart/laravel-modules` — modular architecture
- `intervention/image-laravel` — image processing and resizing
- `barryvdh/laravel-dompdf` — PDF invoice generation
- `maatwebsite/excel` — Excel import/export
- `laravel/socialite` — social login (Google, Facebook)
- `mews/purifier` — HTML sanitization
- `google/recaptcha` — form protection

Payment SDKs: `stripe/stripe-php`, `srmklive/paypal`, `razorpay/razorpay`, `mollie/laravel-mollie`.

Frontend: Vite 6, Bootstrap 5, Sass, Vue 3, Axios.

## Configuration

All available environment variables are documented in `.env.example`. The most important ones to set up:

- `APP_URL` — your domain
- `DB_*` — database connection
- `MAIL_*` — SMTP settings for transactional emails
- `PAYPAL_*` — PayPal credentials (if using PayPal)

Other payment gateways (Stripe, Razorpay, Mollie, etc.) are configured through the admin panel at **Admin → Payment Settings**.

## Deploying to production

```bash
composer install --no-dev --optimize-autoloader
npm ci && npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link
php artisan migrate --force
```

Make sure `APP_DEBUG` is set to `false` and `APP_ENV` is set to `production` in your `.env`.

## Database dump

A full database dump is included at `reaktive_travel.sql` in the project root. This contains all the data from the development/staging environment including services, translations, user accounts, and configuration. Import it on a fresh setup to get the platform running with all existing content.

## License

Proprietary — all rights reserved.
