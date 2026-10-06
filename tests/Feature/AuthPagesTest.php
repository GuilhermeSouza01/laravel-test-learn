<?php

use App\Models\User;

it('test that login works', function () {
    $user = User::factory()->create([
        'password' => bcrypt($password = 'password'),
    ]);

    visit('/login')
        ->type('email', $user->email)
        ->type('password', 'password')
        ->press('Log in')
        ->assertPathIs('/dashboard');
});

it('test that mobile menu works', function() {
   $user = User::factory()->create([
        'password' => bcrypt($password = 'password'),
    ]);

   visit('/login')
        ->on()->mobile()
        ->type('email', $user->email)
        ->type('password', 'password')
        ->press('Log in')
        ->assertPathIs('/dashboard')
        ->press('[data-slot=sidebar-trigger]')
        ->assertVisible('Laravel');
});
