<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'photo', 'batch_id'];

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
