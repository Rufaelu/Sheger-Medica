<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Herb_remedy;
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
    ];

    public $timestamps = true;

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'posted_by', 'user_id');
    }

    public function remedies()
    {
        return $this->belongsToMany(Remedies::class, 'herb_remedy', 'herb_id', 'remedy_id');
    }

}
