<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table = 'reviews';

    protected $primaryKey = 'review_id';

    protected $fillable = [
        'user_id',
        'remedy_id',
        'rating',
        'comments',
    ];

    public $timestamps = true;

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }


    public function remedy()
    {
        return $this->belongsTo(Remedy::class, 'remedy_id', 'remedy_id');
    }
    public function herbs()
    {
        return $this->belongsTo(Herbs::class, 'herb_id', 'herb_id');
    }
}
