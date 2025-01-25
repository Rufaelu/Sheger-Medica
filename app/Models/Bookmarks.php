<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmarks extends Model
{
    protected $table = 'bookmarks';

    protected $primaryKey = 'bookmark_id';

    protected $fillable = [
        'user_id',
        'herb_id',
        'remedy_id',
        'practitioner_id',
    ];

    public $timestamps = true;

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function herb()
    {
        return $this->belongsTo(Herb::class, 'herb_id', 'herb_id');
    }

    public function remedy()
    {
        return $this->belongsTo(Remedy::class, 'remedy_id', 'remedy_id');
    }


}
