<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Post;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
        'header_image',
        'university',
        'faculty',
        'languages',
        'location',
        'experience',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function savedPrograms()
    {
        return $this->belongsToMany(Post::class, 'saved_programs', 'user_id', 'post_id');
    }

    public function appliedPrograms()
    { 
        return $this->belongsToMany(Post::class, 'applied_programs', 'user_id', 'post_id')
        ->withPivot('status', 'created_at')
        ->withTimestamps();  
    }
    public function messages()
    {
        return $this->hasMany(Message::class, 'user_id'); // Assuming 'user_id' is the foreign key in the messages table
    }
}
