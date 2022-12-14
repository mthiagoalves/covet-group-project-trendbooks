<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'price',
        'image',
    ];

    protected $table = 'book';

    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
