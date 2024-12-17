<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Remedies extends Model
{
    protected $table = 'remedies';

    protected $primaryKey = 'remedy_id';

    protected $fillable = [
        'title',
        'herb_id',
        'preparation_steps',
        'dosage',
        'ailment',
        'posted_by',
        'status',
    ];

    public $timestamps = true;

    // Relationships
    public function herb()
    {
        return $this->belongsTo(Herb::class, 'herb_id', 'herb_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'posted_by', 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'remedy_id', 'remedy_id');
    }
}
