<?php

namespace Database\Factories;

use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PenggunaFactory extends Factory
{
    protected $model = Pengguna::class;

    public function definition(): array
    {
        return [
            'nama_lengkap'      => $this->faker->name(),
            'username'          => $this->faker->unique()->userName(),
            'email'             => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'role'              => 'user', // atau 'admin' kalau mau, sesuai kebutuhan kamu
            'remember_token'    => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
