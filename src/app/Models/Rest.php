<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rest extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'end',
        'total',
        'attendance_id',
    ];

    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }
}
