<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CastMovie extends Model
{
    use HasFactory;
    // CastMovie.php model
public function movie()
{
    return $this->belongsTo(Movie::class);
}

public function cast()
{
    return $this->belongsTo(Cast::class);
}



}
