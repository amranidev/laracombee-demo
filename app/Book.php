<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];

    /**
     * Recombee item columns.
     * 
     * @var array
     */
    public static $laracombee = [
        'title' => 'string', 
        'body'  => 'string',
    ];
}
