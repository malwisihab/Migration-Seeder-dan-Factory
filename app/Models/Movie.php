<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Movie extends Model
{
    use HasFactory;

protected $table = 'movies';


    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;



    protected $fillable =  [
        'id',
        'title',
        'synopsis',
        'poster',
        'year',
        'available',
        'genre_id',
    ];

    protected static function booted()
    {
        static::creating(function ($movies) {
            $movies->id = (string) Str::uuid();
        });
    }

    // Relasi dengan CastMovie
    public function castMovies()
    {
        return $this->hasMany(CastMovie::class);
    }

    // Relasi dengan Genre
    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
}
