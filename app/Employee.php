<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Employee
 *
 * @package App
 * @property string $company
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
*/
class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'department',
        'first_name', 
        'last_name', 
        'email', 
        'phone',
    ];
    protected $hidden = [];
    
    
    
    public function task()
    {
        return $this->hasMany(Task::class);
    }
    
}
