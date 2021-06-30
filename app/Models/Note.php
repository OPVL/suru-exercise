<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
    ];

    protected function getDisplayDateAttribute(): string
    {
        return $this->created_at->format('D, jS F @ g:i');
    }
}
