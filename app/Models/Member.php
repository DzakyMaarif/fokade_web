<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'photo', 'batch_id', 'division_id', 'school_id'];

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
