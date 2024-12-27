<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

   // Define the relationship with the Organizer
   public function organizer()
   {
       return $this->belongsTo(Organizer::class); // Ensure Organizer model exists
   }

   public function applicants()
   {
       return $this->belongsToMany(User::class, 'applied_programs', 'post_id', 'user_id')->withTimestamps();
   }

   public function applicantsWithStatus()
   {
       return $this->belongsToMany(User::class, 'applied_programs', 'post_id', 'user_id')
                   ->withPivot('status')
                   ->withTimestamps();
   }

}