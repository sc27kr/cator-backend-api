# Cator (Cat + Mentor) Back-End API

An API to manage Q&A built with Laravel.

## Getting started

### Prerequisites
```bash
docker -v
docker-compose -v
```

### Installing

Clone this repo.

```bash
git clone https://github.com/sc27kr/laravel-cator-backend-api.git
```

Copy .env.

```bash
cd cator-backend-api
cp .env.example .env
```

Create and start containers.

```bash
sail build --no-cache
sail up
sail php -v
```

Create database and migrate.

```bash
sail artisan migrate --seed
```

List all registered routes.

```bash
sail artisan route:list
```

Enjoy!

## Built with

* PHP v8.2.7
* Laravel v10.13.5
