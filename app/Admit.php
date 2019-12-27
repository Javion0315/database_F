<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admit extends Model
{
    protected $primaryKey = 'id';

    protected function patients()
    {
        return $this->belongsTo(Patient::class, 'char_no', 'char_no');
    }

    protected function ward()
    {
        return $this->belongsTo(Ward::class, 'room', 'room');
    }
}
