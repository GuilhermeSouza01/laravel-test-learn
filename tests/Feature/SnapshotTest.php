<?php

test('snapshot home page', function () {
    $response = $this->get('/');

    expect($response->content())->toMatchSnapshot();
})->group('snapshots'); // can use group to run only snapshot tests using "php artisan test --group=snapshots"

test('matches homepage screenshot', function () {

    visit('/')
        ->assertScreenshotMatches();
})->group('snapshots');
