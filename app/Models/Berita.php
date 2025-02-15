<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto', 
        'judul', 
        'deskripsi', 
        'kategori_id', 
        'published_at', 
        'status', 
        'user_id'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getIsPublishedAttribute()
    {
        return $this->status === 'published' && $this->published_at !== null && $this->published_at <= now();
    }
}
