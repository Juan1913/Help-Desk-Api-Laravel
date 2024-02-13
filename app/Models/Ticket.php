<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'category_name', 
        'title', 
        'description', 
        'status',
        'asigned_to', 
        'priority',
    ];


protected $attributes = [
        'status' => 'abierto',
];


public function user(){

    return $this->belongsTo(User::class);

}

public function assignedTo(){

    return $this->belongsTo(User::class, 'assigned_to');
}


 public function category(){

    return $this->belongsTo(Category::class);
 }

 public function comments(){

    return $this->hasMany(Comment::class, 'ticket_id');
    
 }
}
