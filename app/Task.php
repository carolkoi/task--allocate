<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_complete' => 'boolean',
        'is_ongoing' => 'boolean',
    ];


    protected $fillable = [
        'name',
        'description',
        'status',
        'assigned',
        'priority',
        'category',
        'start',
        'due',
        'user_id',
        'employee_id',
        


    ];

    protected $dates = [
        'start',
        'due',
    ];
  
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
