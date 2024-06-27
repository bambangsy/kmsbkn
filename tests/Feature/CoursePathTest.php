<?php

it('has coursepath page', function () {
    $response = $this->get('/coursepath');

    $response->assertStatus(200);
});
