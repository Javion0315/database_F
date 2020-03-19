<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class operate extends Model
{
    protected $primaryKey = 'op_id';

    protected function patients()
    {
        return $this->belongsTo(Patient::class, 'char_no', 'char_no');
    }

    protected function doctor()
    {
        return $this->belongsTo(Doctor::class, 'ssn', 'doc_ssn');
    }
    
}
