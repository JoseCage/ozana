<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

use Ozana\Modules\Users\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $token;

    protected function setUp(): void
    {
        parent::setUp();

        $email = $random = substr(md5(mt_rand()), 0, 7).'@ozana.app';

       factory(User::class, 1)->create([
           'email' => $email,
       ]);

        $response = $this->post('api/auth/login', [
            'email' => $email,
            'password' => 'secret'
        ]);

        $this->token = $response->original['access_token'];

    }
}
