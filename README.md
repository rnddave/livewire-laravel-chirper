# livewire-laravel-chirper
My first time playing with [Livewire](https://livewire.laravel.com/) will be to follow the example project from the Laravel Bootcamp. This is a \#buildInPublic project.

[Build this project yourself](https://bootcamp.laravel.com/livewire/installation)

---

- Created a github repo 
- Cloned to my laptop and moved to that directory
- I use docker for playing with PHP projects in general: `curl -s "https://laravel.build/chirper" | bash`
- Change to the new directory and bring up the base project `./vendor/bin/sail up`
- Use Breeze (a minimal authentication implementation) `composer require laravel/breeze --dev`
- And bring in **livewire** `php artisan breeze:install livewire`

With the basic project in place, we can move on to Models, Controllers and Components. 

Using `artisan` we can create Model/Migration/Controller at the same time:

- Let's dive in `php artisan make:model -mc Chirp`

>   INFO  Model [app/Models/Chirp.php] created successfully.  **Eloquent Model**
>   INFO  Migration [database/migrations/2024_04_17_095543_create_chirps_table.php] created successfully.  **DB**
>   INFO  Controller [app/Http/Controllers/ChirpController.php] created successfully.  **Handle requests, return response**

- 

Useful for me to remember (accessing composer and artisan commands via cli if not added to shell).

> When developing applications using Sail, you may execute Artisan, NPM, and Composer commands via the Sail CLI instead of invoking them directly

```
    ./vendor/bin/sail php --version
    ./vendor/bin/sail artisan --version
    ./vendor/bin/sail composer --version
    ./vendor/bin/sail npm --version
```