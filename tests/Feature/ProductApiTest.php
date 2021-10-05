<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_product()
    {
        $formDate = [
            'name'=> 'FirstTask',
            'description'=>'TestDescription more text',
            'main_picture'=>'https://shikimori.one/animes/339-serial-experiments-lain',
            'images'=>'https://docs.google.com/',
//            'user_id'=>'5',
            'price'=>'1300'
        ];
        $this->post(route('products.store'),$formDate)
            ->assertStatus(Response::HTTP_CREATED);
    }
}
