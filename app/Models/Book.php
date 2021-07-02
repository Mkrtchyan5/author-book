<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class)->withTimestamps();
    }

    /**
     * @param array $data
     * @return \App\Models\Author
     */
    public function createBook(array $data)
    {
        return Book::create([
            'title' => $data['title'],
        ]);
    }
}
