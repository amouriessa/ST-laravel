<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bro extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jabatan',
        'email',
        'alamat',
        'user_id',
        'is_complete',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
