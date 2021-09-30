<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'host',
        'user',
    ];

    public function getStatusAttribute()
    {
        return $this->history()->first();
    }

    public function history()
    {
        return $this->hasMany(Status::class)
            ->latest();
    }
}
