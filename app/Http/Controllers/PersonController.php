<?php

namespace App\Http\Controllers;

class PersonController extends Controller
{
    public function index()
    {
        $persons = [
              [
                  'id' => 1,
                  'name' => 'Daniil',
                  'age' => 19,
                  'job' => 'programmer'
              ],
            [
                'id' => 2,
                'name' => 'Oleg',
                'age' => 23,
                'job' => 'businessman'
            ],
            [
                'id' => 3,
                'name' => 'Denis',
                'age' => 42,
                'job' => 'seller'
            ]
        ];
        return $persons;
    }
}
