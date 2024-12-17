<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Herbs extends Model
{
    protected $table = 'herbs';

    protected $primaryKey = 'herb_id';

    protected $fillable = [
        'local_name',
        'scientific_name',
        'region',
        'benefits',
        'risks',
        'image_path',
        'posted_by',
        'status',
    ];

    public $timestamps = true;

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'posted_by', 'user_id');
    }

    public function remedies()
    {
        return $this->hasMany(Remedy::class, 'herb_id', 'herb_id');
    }
}
