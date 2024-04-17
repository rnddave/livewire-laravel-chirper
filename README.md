# livewire-laravel-chirper
My first time playing with [Livewire](https://livewire.laravel.com/) will be to follow the example project from the Laravel Bootcamp. This is a \#buildInPublic project.

[Build this project yourself](https://bootcamp.laravel.com/livewire/installation)

---

# Getting Started 

- Created a github repo 
- Cloned to my laptop and moved to that directory
- I use docker for playing with PHP projects in general: `curl -s "https://laravel.build/chirper" | bash`
- Change to the new directory and bring up the base project `./vendor/bin/sail up`
- Use Breeze (a minimal authentication implementation) `composer require laravel/breeze --dev`
- And bring in **livewire** `php artisan breeze:install livewire`

With the basic project in place, we can move on to Models, Controllers and Components. 

Using `artisan` we can create Model/Migration/Controller at the same time:

- Let's dive in `php artisan make:model -mc Chirp`

    INFO  Model [app/Models/Chirp.php] created successfully.  **Eloquent Model**

    INFO  Migration [database/migrations/2024_04_17_095543_create_chirps_table.php] created successfully.  **DB**

    INFO  Controller [app/Http/Controllers/ChirpController.php] created successfully.  **Handle requests, return response**


Making Routes, Controller, View = standard Laravel stuff. 

## Render with Livewire 

When we have something to render via Livewire we use the `make:volt` command: `php artisan make:volt chirps/create --class`

This command will create a new Livewire component at `resources/views/livewire/chirps/create.blade.php`

## Navigation

I'm using **Breeze** for this project; 

- update `navigation.blade.php` to add items

This file has duplicated links, one for desktop, one for responsive (mobile) devices. So update twice in this example anyway.

> I am impressed by how easy it is to get fully functional navigation and user profile sections with **breeze**.

##  Mass Assignment Protection 

Important to control what data a user can pass in order to prevent/avoid [mass assignment vulnerability](https://en.wikipedia.org/wiki/Mass_assignment_vulnerability). Laravel protects against this by default, but this default protection can make some deliberate mass assignments inconvenient. Therefore it is important to understand your database and usecases to decide which attributes are safe for mass assignment, we mark these as `$fillable`.

## Database migrations

When application was created, laravel applied any default migrations to create starting database for us. Can review with: 

`php artisan db:show`
![php artisan db:show](/assets/php-artisan-db_show.png)
`php artisan db:table users`
![php artisan db:table users](/assets/php-artisan-show_table_users.png)

We need to add any new columns to our migration file: 

`databases/migrations/<timestamp>_create_chirps_table.php`

After any changes, we need to push those changes to the database with `php artisan migrate`  .

**NB** For dev only, can use `php artisan migrate:refresh` which will dump your current data and recreate from scratch, useful if also using a factory. 

## Tinker

We haven't built a 'show' view yet. We can still review our chirps so far by using **Tinker**. 

- Start Tinker in a new console window `php artisan tinker`
- At the prompt: `App\Models\Chirp:all();`

You can then see any chirps you sent during testing. 


# Showing Current Chirps

- Add a *list* option for `resources/views/chirps.blade.php`
- Using **volt** to create a new livewire component: `php artisan make:volt chirps/list --class`
- Update that new file here `resources/views/livewire/chirps/list.blade.php`
  
## New Chirps

When a new chirp is created, we want the chirp to appear without having to manually refresh the page. We make use of **livewire events**.

- add a **dispatch** to `resources/views/livewire/chirps/create.blade.php` *to announce something new*
- add a listener to `resources/views/livewire/chirps/list.blade.php` *to listen for new chirps and update list* 

We also need to show a relationship between the user and the chirp. 

- update the `app/Models/Chirp.php` 
- adding a **belongs to** relationship

Once the relationship between chirps and users is established, we can refresh the page and see the following: 

![Chirps timeline view](/assets/chirps-timeline.png)

---

Useful for me to remember (accessing composer and artisan commands via cli if not added to shell).

> When developing applications using Sail, you may execute Artisan, NPM, and Composer commands via the Sail CLI instead of invoking them directly

```
    ./vendor/bin/sail php --version
    ./vendor/bin/sail artisan --version
    ./vendor/bin/sail composer --version
    ./vendor/bin/sail npm --version
```