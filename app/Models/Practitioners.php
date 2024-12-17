<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Practitioners extends Model
{
    protected $table = 'practitioners';

    protected $primaryKey = 'practitioner_id';

    protected $fillable = [
        'user_id',
        'specialties',
        'region',
        'contact_info',
        'reviews_count',
        'average_rating',
        'approval_status',
    ];

    public $timestamps = false;

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'practitioner_id', 'practitioner_id');
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'practitioner_id', 'practitioner_id');
    }   }
