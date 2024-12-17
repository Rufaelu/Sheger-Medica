<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';

    protected $primaryKey = 'article_id';

    protected $fillable = [
        'title',
        'content',
        'author_id',
        'status',
    ];

    public $timestamps = true;

    // Relationships
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'user_id');
    }
}
