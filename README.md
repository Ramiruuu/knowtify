# Knowtify — Notes API

A simple, modern and secure notes backend built with Laravel. Clean API, token-based auth (Sanctum), and tested endpoints — ready for a React/Vue frontend or mobile app.

This repository contains a lean notes API focused on security and best practices. It is suitable for demonstration to employers and for continuing development into a full product.

## Highlights
- Simple, well-structured Laravel 12 application
- Sanctum-based authentication for SPA and token flows
- Form Requests for validation and Policies for authorization
- API Resources to standardize JSON responses
- Tests (Pest) covering authentication and notes CRUD
- Ready to run locally with SQLite or MySQL (SQLyog)

## Tech stack
- PHP 8.2
- Laravel 12
- SQLite (default for development & tests) / MySQL (optional)
- Laravel Sanctum for API authentication
- Pest for tests
- Vite + Tailwind (frontend assets scaffold)

## API Endpoints (brief)
All endpoints require authentication (Sanctum):

- GET  /api/notes — list user's notes
- POST /api/notes — create a note (title required)
- PUT  /api/notes/{note} — update a note (owner only)
- DELETE /api/notes/{note} — delete a note (owner only)

Requests and responses are validated and shaped using Form Requests and API Resources. Unauthorized actions return 401/403 where appropriate.

## Testing
The project uses Pest. Tests run with an in-memory SQLite database by default.

```powershell
php artisan test
```

All tests should pass (feature and auth tests are included).

## Project structure (short)
- `app/Http/Controllers` — controllers and auth flows
- `app/Models` — Eloquent models
- `app/Policies` — authorization rules
- `app/Http/Requests` — validation rules
- `app/Http/Resources` — API response shapes
- `database/migrations` — schema
- `tests/Feature` — feature tests

## Security & best practices followed
- Policies and route-model binding to prevent ID guessing
- Input validation via Form Requests
- Throttling on API routes to reduce abuse
- Secrets are excluded from git via `.gitignore` (`.env` is ignored)

## How this helps your future employer
- The code is organized and tested — shows you can build reliable backends
- Uses current Laravel best practices (policies, resources, form requests)
- Easy to extend: add features, frontend, CI, or cloud deployment

## Next steps (optional enhancements)
- Add CI (GitHub Actions) to run tests on push/PR
- Add API documentation (OpenAPI / Swagger)
- Add pagination and search for notes
- Add Docker compose for consistent local dev

## Contribution & contact
If you want changes, open an issue or submit a pull request on GitHub.
For direct contact: add your preferred email or LinkedIn in this section.

---
Thank you for checking out Knowtify — let me know if you want me to add CI, data migration helpers, or a polished frontend.
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
