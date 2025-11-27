# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel 12 application with Filament v4 admin panel. The application uses PostgreSQL as the primary database and is configured to run with Laravel Herd.

**Key Technologies:**
- PHP 8.2+
- Laravel 12 (streamlined structure)
- Filament v4 (admin panel at `/admin`)
- Livewire v3
- Tailwind CSS v4
- Pest v4 (testing framework)
- Vite (frontend bundling)

## Development Commands

### Running the Application

```bash
# Full development environment (server, queue, logs, vite)
composer run dev

# Individual services
php artisan serve          # Development server
npm run dev                # Vite dev server
npm run build              # Production build
```

### Database

```bash
# Run migrations
php artisan migrate

# Fresh database with seeders
php artisan migrate:fresh --seed
```

### Testing

```bash
# Run all tests
php artisan test

# Run specific test file
php artisan test tests/Feature/ExampleTest.php

# Run tests matching a filter
php artisan test --filter=testName
```

### Code Quality

```bash
# Format code with Laravel Pint
vendor/bin/pint --dirty
```

### Initial Setup

```bash
composer run setup
```

This will:
1. Install Composer dependencies
2. Copy `.env.example` to `.env` if needed
3. Generate application key
4. Run migrations
5. Install npm dependencies
6. Build frontend assets

## Architecture

### Application Structure

This project uses Laravel 12's streamlined directory structure:

- **No `app/Console/Kernel.php`** - Commands in `app/Console/Commands/` are auto-registered
- **No middleware directory** - Middleware configured in `bootstrap/app.php`
- **`bootstrap/app.php`** - Central configuration for middleware, exceptions, routing
- **`bootstrap/providers.php`** - Application service providers registration

### Filament Admin Panel

The application includes a Filament v4 admin panel:

- **Panel Provider:** `app/Providers/Filament/AdminPanelProvider.php`
- **Resources:** Auto-discovered from `app/Filament/Resources/`
- **Pages:** Auto-discovered from `app/Filament/Pages/`
- **Widgets:** Auto-discovered from `app/Filament/Widgets/`
- **Access:** `/admin` path with login authentication
- **Primary Color:** Amber

When creating Filament resources, pages, or widgets, they will be automatically discovered by the panel.

### Database Configuration

- **Primary Database:** PostgreSQL
- **Default Connection:** `pgsql`
- **Session Driver:** `database`
- **Queue Connection:** `database`
- **Cache Store:** `database`

### Frontend

- **Tailwind CSS v4:** Uses `@import "tailwindcss"` syntax (not `@tailwind` directives)
- **Vite:** Asset bundling with Laravel Vite plugin
- **Entry Points:**
  - `resources/css/app.css`
  - `resources/js/app.js`

### Testing

- **Framework:** Pest v4 with Laravel plugin
- **Feature Tests:** `tests/Feature/`
- **Unit Tests:** `tests/Unit/`
- **Browser Tests:** `tests/Browser/` (Pest v4 browser testing available)

## Laravel Boost MCP Server

This project has Laravel Boost installed, which provides specialized MCP tools:

- **`search-docs`** - Search version-specific Laravel ecosystem documentation
- **`tinker`** - Execute PHP code for debugging
- **`database-query`** - Query the database directly
- **`browser-logs`** - Read browser console logs and errors
- **`list-artisan-commands`** - List available Artisan commands with parameters
- **`get-absolute-url`** - Get correct project URLs with scheme/domain/port

Always use `search-docs` before implementing Laravel-related features to ensure you're following current best practices for installed package versions.

## Development Guidelines

### Creating New Files

Always use Artisan commands:

```bash
# Models (with factory and migration)
php artisan make:model Post -mf

# Controllers
php artisan make:controller PostController

# Form Requests
php artisan make:request StorePostRequest

# Tests
php artisan make:test PostTest --pest          # Feature test
php artisan make:test PostTest --pest --unit   # Unit test

# Livewire Components
php artisan make:livewire Posts/CreatePost

# Generic PHP Classes
php artisan make:class Services/PaymentService
```

Always pass `--no-interaction` when automating commands.

### Model Conventions

- Use `casts()` method for type casting (not `$casts` property)
- Include explicit return types on relationship methods
- Use constructor property promotion
- Create factories and seeders for all models

### Validation

Always create Form Request classes instead of inline controller validation. Check sibling Form Requests to determine if this project uses array or string-based validation rules.

### Testing Workflow

1. Write/update tests for new features
2. Run filtered tests during development: `php artisan test --filter=testName`
3. Verify changes with Pint: `vendor/bin/pint --dirty`
4. Run full test suite before finalizing

### Frontend Changes

If frontend changes aren't reflected:
- Check if `npm run dev` or `composer run dev` is running
- Try `npm run build` for production assets

### Common Errors

**Vite Manifest Error:** Run `npm run build` or start `npm run dev`

## Code Style

- **PHP 8+ features:** Constructor property promotion, named arguments, etc.
- **Type hints:** Always use explicit return types and parameter types
- **Braces:** Always use curly braces for control structures
- **PHPDoc:** Use for complex array shapes, prefer over inline comments
- **Enums:** Use TitleCase for enum cases

### Eloquent Best Practices

- Prefer `Model::query()` over `DB::`
- Use relationship methods with type hints
- Eager load to prevent N+1 queries
- Use query scopes for reusable query logic

### Livewire v3

- Components use `App\Livewire` namespace
- `wire:model` is deferred by default, use `wire:model.live` for real-time
- Use `$this->dispatch()` for events (not `emit`)
- Alpine.js included automatically (don't import separately)
- Always use single root element in component views
- Add `wire:key` to loops

### Tailwind v4

- Use `@import "tailwindcss"` (not `@tailwind` directives)
- Use `@theme` directive for theme configuration
- Use gap utilities for spacing (avoid margins in lists)
- Deprecated utilities replaced (see Laravel Boost guidelines)

## Filament Specific

When working with Filament:
- Resources, Pages, and Widgets are auto-discovered
- Check existing Filament components for patterns
- Use Filament's form builder and table builder
- Follow Filament conventions for actions and notifications
