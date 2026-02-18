<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZoomMeeting extends Model
{
    protected $fillable = [
        'title',
        'meeting_id',
        'starts_at',
        'duration_minutes',
        'image_path',       // <-- match DB
        'description',
        'is_published',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'is_published' => 'boolean',
    ];
}