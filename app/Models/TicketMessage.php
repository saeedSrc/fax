<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_image', 'answer_image' , 'question', 'answer',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
