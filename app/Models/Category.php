<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $fillable = ['name', 'slug'];

    // nama function sesuai permintaan di route atau controller
    public function relasi_post()
    {
        return $this->hasMany(Post::class);
    }

    public function getRouteKeyname()
    {
        return 'slug';
    }
}
