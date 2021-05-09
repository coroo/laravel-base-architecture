<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Account\UserProfile;
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

$factory->define(UserProfile::class, function (Faker $faker) {
    $userFacker = factory('App\User')->create();
    return [
        'user_id'   => $userFacker->id,
        // 'kode_nas' => $faker->text(),
        'nama_aslu' => $userFacker->name,
        'nama_hijrah' => $userFacker->name,
        'email' => $faker->unique()->safeEmail,
        'jenis_kelamin' => 'male',
        'tempat_lahir' => $faker->state(),
        'tanggal_lahir' => $faker->date(),
        'golongan_darah' => 'A',
        'status_kawin' => 'S',
        'ayah_kode_nas' => $faker->text(),
        'ayah_nama_hijrah' => $faker->text(),
        'ibu_kode_nas' => $faker->text(),
        'ibu_nama_hijrah' => $faker->text(),
        'wali_kode_nas' => $faker->text(),
        'wali_nama_hijrah' => $faker->text(),
        'alamat' => $faker->state(),
        'kelurahan' => $faker->state(),
        'kecamatan' => $faker->state(),
        'kabupaten' => $faker->state(),
        'provinsi' => $faker->state(),
        'kode_pos' => $faker->state(),
        'no_telepon' => $faker->text(),
        'whatsapp' => $faker->text(),
        'pin_bb' => $faker->text(),
        'nama_akun_fb' => $faker->text(),
    ];
});
