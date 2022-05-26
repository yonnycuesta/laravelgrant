<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'imagen', 'value_required', 'value_grant', 'description'];



    public function grants()
    {
        return $this->belongsToMany(Grant::class);
    }
}
