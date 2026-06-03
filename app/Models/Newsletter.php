<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $fillable = [
        'subject', 'body', 'sent_at'
    ];
    protected function casts(): array {
        return [
            'sent_at' => 'datetime',
        ];
    }
}
