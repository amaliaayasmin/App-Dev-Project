<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   use HasFactory;
   protected $table = 'posts' ; 
   protected $fillable = [
        
        'title',
        'location',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'benefits',
        'description',
        'image',
        'organizer_id'
   ];

   public function organizer()

   {
    return $this->belongsTo(Organizer::class);
    }

   public function applicants()
    {
    return $this->belongsToMany(User::class, 'applied_programs', 'post_id', 'user_id')->withTimestamps();
    }

}