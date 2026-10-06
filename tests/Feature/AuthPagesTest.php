<?php

use App\Models\User;

beforeEach(function () {
     $this->user = User::factory()->create([
        'password' => bcrypt($password = 'password'),
    ]);
});

it('test that login works', function () {


    visit('/login')
        ->type('email', $this->user->email)
        ->type('password', 'password')
        ->press('Log in')
        ->assertPathIs('/dashboard');
});

it('test that mobile menu works', function() {


   visit('/login')
        ->on()->mobile()
        ->type('email', $this->user->email)
        ->type('password', 'password')
        ->press('Log in')
        ->assertPathIs('/dashboard')
        ->press('[data-slot=sidebar-trigger]')
        ->assertVisible('Laravel');
});
