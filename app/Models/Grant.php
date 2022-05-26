<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    use HasFactory;
    protected $fillable = ["post_id", "name", "address","phone","value_grant"];



    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
