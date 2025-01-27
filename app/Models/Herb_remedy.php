<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Herbs;
use App\Models\Remedies;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Herb_remedy extends Model
{  use HasFactory;

    // Define the table name
    protected $table = 'herb_remedy';
    public $timestamps = true;

    // Allow mass assignment for these attributes
    protected $fillable = [
        'herb_id',
        'remedy_id',
    ];

    /**
     * Relationship with the Herb model.
     * Each HerbRemedy belongs to a Herb.
     */
    public function herb()
    {
        return $this->belongsTo(Herbs::class, 'herb_id', 'herb_id');
    }

    /**
     * Relationship with the Remedy model.
     * Each HerbRemedy belongs to a Remedy.
     */
    public function remedy()
    {
        return $this->belongsTo(Remedies::class, 'remedy_id', 'remedy_id');
    }
    //
}
