<?php

use App\Models\User;

use function Pest\Laravel\get;

it('shows welcome page', function () {
    $response = get('/');

    $response->assertStatus(200);
});

it('shows login page', function () {
    visit('/login')
        ->assertSee('Log in to your account')
        ->assertDontSee('Dashboard');
});

it('test that there are on console logs and errors', function () {
    $pages = visit(['/', '/login', '/register']);
    [$home, $login, $register] = $pages;
    $home->assertTitle('Welcome - Laravel');
    $login->assertTitle('Log in - Laravel');
    $register->assertTitle('Register - Laravel');

    $pages->assertNoConsoleLogs()
        ->assertNoJavascriptErrors();
});
