# Trippy 🌍✨

**Trippy** is a **Laravel-based RESTful API** designed to streamline and enhance travel planning. It powers web and mobile applications by providing endpoints to create, manage, and organize trips, supporting everything from short getaways to complex multi-destination journeys.

## Features 🚀

- 🗺️ **Trip Management**: Create and manage multiple trips effortlessly.
- 📝 **Itinerary Builder**: Add destinations, dates, and activities.
- 📦 **Modern Stack**: Laravel 10+.
- 💡 **Easy Configuration**: .env-based environment management.
- ⚙️ **Scalable**: Designed for future enhancements like user auth, media uploads, and sharing.

## Tech Stack 🛠️

- **Backend:** Laravel PHP Framework
- **Database:** Postgres (configured via `.env`)
- **Package Manager:** Composer (PHP), npm (JS)
- **Testing:** PHPUnit (Laravel default)

## Getting Started 💻

### Prerequisites

- PHP >= 8.1
- Composer
- Node.js & npm
- PostgreSQL

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/Slymee/Trippy.git
   cd Trippy
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install
   ```

3. Copy `.env` and configure:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configure your database credentials in `.env` file.
    ```bash
    # .env.example
    APP_NAME=Laravel
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=http://localhost

    LOG_CHANNEL=stack
    LOG_DEPRECATIONS_CHANNEL=null
    LOG_LEVEL=debug

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=

    BROADCAST_DRIVER=log
    CACHE_DRIVER=file
    FILESYSTEM_DISK=local
    QUEUE_CONNECTION=sync
    SESSION_DRIVER=file
    SESSION_LIFETIME=120

    MEMCACHED_HOST=127.0.0.1

    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379

    MAIL_MAILER=smtp
    MAIL_HOST=mailpit
    MAIL_PORT=1025
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS="hello@example.com"
    MAIL_FROM_NAME="${APP_NAME}"

    AWS_ACCESS_KEY_ID=
    AWS_SECRET_ACCESS_KEY=
    AWS_DEFAULT_REGION=us-east-1
    AWS_BUCKET=
    AWS_USE_PATH_STYLE_ENDPOINT=false

    PUSHER_APP_ID=
    PUSHER_APP_KEY=
    PUSHER_APP_SECRET=
    PUSHER_HOST=
    PUSHER_PORT=443
    PUSHER_SCHEME=https
    PUSHER_APP_CLUSTER=mt1

    VITE_APP_NAME="${APP_NAME}"
    VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
    VITE_PUSHER_HOST="${PUSHER_HOST}"
    VITE_PUSHER_PORT="${PUSHER_PORT}"
    VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
    VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
    ```

5. Run migrations:
   ```bash
   php artisan migrate
   ```

6. Serve the app:
   ```bash
   php artisan serve
   ```

### Access the App
Once running, visit: [http://localhost:8000](http://localhost:8000)

## Contributing 🤝

Contributions are welcome! Feel free to fork the repo and submit a pull request.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request


## License 📄

Distributed under the MIT License. See `LICENSE` for more information.

## Contact 📬

Project by [Slymee](https://github.com/Slymee)
