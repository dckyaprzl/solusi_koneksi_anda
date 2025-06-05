<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = ['post_name', 'title', 'deskripsi', 'gambar', 'status'];


}
