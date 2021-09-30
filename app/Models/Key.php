<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'key',
        'user_id',
    ];

    public function getFingerprintAttribute()
    {
        if (!str_starts_with($this->key, 'ssh-rsa ')) {
            return '';
        }

        $content = explode(' ', $this->key, 3);
        return implode(':', str_split(md5(base64_decode($content[1])), 2));
    }
}
