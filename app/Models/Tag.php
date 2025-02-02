<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // Define the relationship with Task
    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}