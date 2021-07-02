<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class)->withTimestamps();
    }

    /**
     * @param array $data
     * @return \App\Models\Author
     */
    public function createAuthor(array $data)
    {
        return Author::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
        ]);
    }

}
