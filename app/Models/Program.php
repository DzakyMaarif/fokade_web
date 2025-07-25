<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'photo', 'batch_id'];

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
