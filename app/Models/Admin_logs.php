<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin_logs extends Model
{
    protected $table = 'admin_logs';

    protected $primaryKey = 'log_id';

    protected $fillable = [
        'admin_id',
        'action',
    ];

    public $timestamps = false;

    // Relationships
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id', 'user_id');
    }
}
