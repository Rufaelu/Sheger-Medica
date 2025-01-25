<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;


class User extends Model
{
    use HasFactory,HasRoles;

    protected $table = 'users';

    protected $primaryKey = 'user_id';

    protected $fillable = [

        'first_name',
        'last_name',
        'email',
        'password',
        'google_id',
        'phone',
        'bio',
        'specialties',
        'average_rating',
        'approval_status',
        'profile_picture',
    ];

    public $timestamps = false;

    // Relationships
    public function herbs()
    {
        return $this->hasMany(Herbs::class, 'posted_by', 'user_id');
    }

    public function remedies()
    {
        return $this->hasMany(Remedies::class, 'posted_by', 'user_id');
    }



    public function reviews()
    {
        return $this->hasMany(Reviews::class, 'user_id', 'user_id');
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmarks::class, 'user_id', 'user_id');
    }

    public function articles()
    {
        return $this->hasMany(Articles::class, 'author_id', 'user_id');
    }

    public function adminLogs()
    {
        return $this->hasMany(Admin_logs::class, 'admin_id', 'user_id');
    }
}
