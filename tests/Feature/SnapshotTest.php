<?php

test('snapshot home page', function () {
    $response = $this->get('/');

    expect($response->content())->toMatchSnapshot();
})->skip();

test('matches homepage screenshot', function () {

    visit('/')
        ->assertScreenshotMatches();
})->only();
