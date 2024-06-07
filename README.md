<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Introduction

Paradiso is a travel application available in both Web and Android versions, designed to cater to a wide range of travel needs. Paradiso offers various travel services, such as hotel bookings, attraction tickets, guided tours, travel vehicles, and much more. This API handle the merchant module of Paradiso

## Features

- Authentication
- Profile Management
- Product Management
- Voucher Management
- Order Management
- Item Transactions
- Chat

## Installation

### Prerequisites
- PHP >= 8.1
- Composer
- MySQL, SQLite, or PostgreSQL

### Steps

```sh
# Clone the repository
git clone https://github.com/Vikovanesta/paradiso-api.git

# Navigate to the project directory
cd paradiso-api

# Install dependencies
composer install

# Copy the example env file and make the required configuration changes
cp .env.example .env

# Generate an application key
php artisan key:generate

# Link storage
php artisan storage:link
```

### Configuration
Configure the necessary environment variables in the .env file.
```dotenv
APP_NAME=Paradisonesia-api
APP_ENV=local
APP_KEY=base64:YOUR_APP_KEY
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=paradiso_api
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### Database Migration
Run the following command to set up your database:
```sh
php artisan migrate
php artisan db:seed
```
## Usage
Start the server:
```sh
php artisan serve
```

## Endpoints
For list on endpoint, visit the API doc at https://paradiso.vikovanesta.me/api/v1
