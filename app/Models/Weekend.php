<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Members;

class Weekend extends Model
{
    use HasFactory;
    protected $fillable = [
        'topic', 
        'member_id', 
        'date',
        'firts_time',
        'last_time'
    ];

    public function member()
    {
        return $this->belongsTo(Members::class);
    }
}
