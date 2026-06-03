<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

// #[Fillable(['subject', 'body', 'sent_at'])]
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
