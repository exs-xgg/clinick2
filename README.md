# Clinick2

A clinic patient management system built with **Laravel 8**. It allows healthcare professionals to manage patient records, track visits, record vital signs, upload medical images, and maintain activity logs.

---

## Tech Stack

| Layer       | Technology                                  |
|-------------|---------------------------------------------|
| Framework   | Laravel 8.x (PHP ^7.3 / ^8.0)              |
| Database    | MySQL                                       |
| Frontend    | Blade templates, Bootstrap 4.6, jQuery 3.6  |
| CSS         | Sass (compiled via Laravel Mix / Webpack)   |
| Icons       | Font Awesome 4.7                            |
| File Storage| MinIO (S3-compatible) / Local               |
| HTTP Client | Guzzle 7                                    |
| Deployment  | Heroku (Apache)                             |

---

## Prerequisites

- **PHP** >= 7.3 (or 8.0+)
- **Composer** >= 2.x
- **Node.js** >= 14.x & **npm**
- **MySQL** >= 5.7 (or MariaDB)
- **MinIO** (optional — for image storage; can use local disk instead)

---

## Installation

### 1. Clone the Repository

```bash
git clone <repository-url>
cd clinick2
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` and configure your database credentials:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=clinick2
DB_USERNAME=root
DB_PASSWORD=your_password
```

If using MinIO for image storage, also configure:

```dotenv
MINIO_ENDPOINT=http://127.0.0.1:9000
MINIO_KEY=your_minio_key
MINIO_SECRET=your_minio_secret
MINIO_REGION=us-east-1
MINIO_BUCKET=clinick
```

### 4. Create the Database

```sql
CREATE DATABASE clinick2;
```

### 5. Run Migrations

```bash
php artisan migrate
```

> This will create all tables **and** seed a default user:
> - **Email:** `nikisantos@yahoo.com`
> - **Password:** `bulalo114`

### 6. Install Frontend Dependencies

```bash
npm install
```

### 7. Compile Assets

```bash
# Development (with source maps)
npm run dev

# Watch for changes during development
npm run watch

# Production build
npm run prod
```

### 8. Create Storage Symlink

```bash
php artisan storage:link
```

### 9. Start the Development Server

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`.

---

## Project Structure

```
clinick2/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── DashboardController.php
│   │   │   ├── PatientController.php
│   │   │   ├── VisitsController.php
│   │   │   ├── ImageController.php
│   │   │   ├── LoginController.php
│   │   │   ├── ActivityLogController.php
│   │   │   └── VitalSignController.php
│   │   └── Middleware/
│   ├── Models/
│   │   ├── User.php
│   │   ├── Patient.php
│   │   ├── Visit.php
│   │   ├── Image.php
│   │   ├── VitalSign.php
│   │   └── ActivityLog.php
│   └── Providers/
├── database/
│   └── migrations/
├── resources/
│   ├── views/
│   │   ├── login.blade.php
│   │   ├── welcome.blade.php
│   │   ├── patient/
│   │   └── includes/
│   ├── js/
│   └── sass/
├── routes/
│   ├── web.php
│   └── api.php
├── config/
├── public/
└── storage/
```

---

## Routes

### Authentication (Public)

| Method | URI        | Controller                  | Action   | Description                    |
|--------|------------|-----------------------------|----------|--------------------------------|
| GET    | `/login`   | *(Closure)*                 | —        | Show login form                |
| POST   | `/login`   | `LoginController@store`     | store    | Authenticate user              |
| GET    | `/logout`  | `LoginController@index`     | index    | Logout and redirect to home    |

### Dashboard (Public — redirects to login if unauthenticated)

| Method | URI | Controller                    | Action | Description                                     |
|--------|-----|-------------------------------|--------|-------------------------------------------------|
| GET    | `/` | `DashboardController@index`   | index  | Dashboard with 10 most recent activity logs     |

### Patient (Authenticated — `web`, `auth` middleware)

| Method | URI                  | Controller                | Action  | Description                  |
|--------|----------------------|---------------------------|---------|------------------------------|
| GET    | `/search`            | `PatientController@index` | index   | Search patients by name/address |
| GET    | `/create-patient`    | `PatientController@create`| create  | Show create patient form     |
| GET    | `/patient`           | `PatientController@index` | index   | List patients                |
| POST   | `/patient`           | `PatientController@store` | store   | Create a new patient         |
| GET    | `/patient/{id}`      | `PatientController@show`  | show    | View patient details & visits|
| GET    | `/patient/{id}/edit` | `PatientController@edit`  | edit    | Edit patient form            |
| PUT    | `/patient/{id}`      | `PatientController@update`| update  | Update patient record        |
| DELETE | `/patient/{id}`      | `PatientController@destroy`| destroy| Delete patient               |

### Visits (Authenticated — `web`, `auth` middleware)

| Method | URI               | Controller                 | Action  | Description                       |
|--------|-------------------|----------------------------|---------|-----------------------------------|
| GET    | `/visit`          | `VisitsController@index`   | index   | List visits                       |
| POST   | `/visit`          | `VisitsController@store`   | store   | Create a new visit for a patient  |
| GET    | `/visit/{id}`     | `VisitsController@show`    | show    | View visit details with images    |
| GET    | `/visit/{id}/edit`| `VisitsController@edit`    | edit    | Edit visit form                   |
| PUT    | `/visit/{id}`     | `VisitsController@update`  | update  | Update visit record               |
| DELETE | `/visit/{id}`     | `VisitsController@destroy` | destroy | Delete visit                      |

### Images (Authenticated — `web`, `auth` middleware)

Both `image` and `images` resource routes point to `ImageController`:

| Method | URI               | Controller                | Action  | Description                         |
|--------|-------------------|---------------------------|---------|-------------------------------------|
| POST   | `/image`          | `ImageController@store`   | store   | Upload image (file or base64)       |
| GET    | `/image/{id}`     | `ImageController@show`    | show    | Serve/display an image by filename  |
| PUT    | `/image/{id}`     | `ImageController@update`  | update  | Update image record                 |
| DELETE | `/image/{id}`     | `ImageController@destroy` | destroy | Delete image                        |

### API

| Method | URI          | Middleware   | Description                |
|--------|--------------|--------------|----------------------------|
| GET    | `/api/user`  | `auth:api`   | Return authenticated user  |

---

## Models

### User
- **Table:** `users`
- **Fillable:** `name`, `email`, `password`
- **Hidden:** `password`, `remember_token`
- **Casts:** `email_verified_at` → `datetime`

### Patient
- **Table:** `patients`
- **Fillable:** `fname`, `lname`, `mname`, `birthdate`, `sex`, `age`, `contact_no`, `civil_stat`, `occupation`, `hmo`, `address`, `temp_id`
- **Relationships:** `hasMany(Visit)`

### Visit
- **Table:** `visits`
- **Fillable:** `patient_id`, `history`, `symptoms`, `diagnosis`, `prescription`, `alias_created_at`
- **Relationships:** `belongsTo(Patient)` via `patient_id` FK

### Image
- **Table:** `images`
- **Fillable:** `patient_id`, `asset_path`
- **Relationships:** `belongsTo(Patient)` via `patient_id` FK
- **Note:** `asset_path` was altered to `longText` to support base64-encoded data

### VitalSign
- **Table:** `vital_signs`
- **Fillable:** `patient_id`, `visit_id`, `temp`, `weight`, `height`, `bp`, `rr`, `hr`
- **Relationships:** `belongsTo(Patient)` via `patient_id` FK, `belongsTo(Visit)` via `visit_id` FK

### ActivityLog
- **Table:** `activity_logs`
- **Fillable:** `patient_id`
- **Relationships:** `belongsTo(Patient)` via `patient_id` FK
- **Purpose:** Tracks when a patient record is accessed/viewed

---

## Deployment (Heroku)

The project includes a `Procfile` for Heroku deployment:

```
web: vendor/bin/heroku-php-apache2 public/
```

---

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
