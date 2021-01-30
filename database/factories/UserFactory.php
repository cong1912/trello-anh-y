<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Board;
use App\Models\CheckItem;
use App\Models\Project;
use App\Models\ListItem;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
$factory->define(Project::class, function (Faker $faker) {
    $name = $faker->sentence(5);
    $slug = Str::slug($name, "-");
    return [
        'name' => $name,
        "slug" => $slug,
    ];
});

$factory->define(Board::class, function (Faker $faker) {
    $name = $faker->sentence(5);
    return [
        'name' => $name,
        'project_id' => function () {
            return Project::all()->random();
        },
        'description' => $faker->text(10),
    ];
});
$factory->define(ListItem::class, function (Faker $faker) {
    $label = '[1,2,3,4]';
    $order = 1;
    return [
        'name' => $faker->sentence(5),
        'board_id' => function () {
            return Board::all()->random();
        },
        'description' => $faker->sentence(10),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'date' => $faker->dateTimeBetween("-4 weeks"),
        'label' => $label,

        'order' => $order++
    ];
});

$factory->define(CheckItem::class, function (Faker $faker) {
    $order = 1;
    return [
        'name' => $faker->sentence(5),
        'list_id' => function () {
            return ListItem::all()->random();
        },
        'description' => $faker->sentence(10),
        'date' => $faker->dateTimeBetween("-4 weeks"),
        'order' => $order++
    ];
});
