<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = ['year', 'name'];

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
