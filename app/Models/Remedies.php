<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Herbs;
use App\Models\Herb_remedy;

class Remedies extends Model
{
    protected $table = 'remedies';

    protected $primaryKey = 'remedy_id';

    protected $fillable = [
        'title',
        'preparation_steps',
        'dosage',
        'ailment',
        'posted_by',
    ];

    public $timestamps = true;

    // Relationships
    public function herb()
    {
        return $this->belongsToMany(Herbs::class, 'herb_remedy', 'remedy_id', 'herb_id');
    }
       public function herbs()
    {
        return $this->belongsToMany(Herbs::class, 'herb_remedy', 'remedy_id', 'herb_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'posted_by', 'user_id');
    }


}
