<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Todo extends Model
{

    use HasFactory, Notifiable;

    protected $fillable = ['title', 'description', 'long_desc'];

    public function toggleCompleted()
    {
        $this->completed = !$this->completed;
        $this->save();
    }


    public function deleteTodo()
    {
        $this->delete();
    }
}
