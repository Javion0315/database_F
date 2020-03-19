<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    //
    
    protected $table = 'operation';

    protected $primaryKey = 'op_id';

    // protected function patient()
    // {
    //     return $this->belongsTo(Patient::class, 'char_no', 'char_no');
    // }
    protected function patient()
    {
        return $this->hasMany(Patient::class, 'char_no', 'char_no');
    }
    protected function doctor()
    {
        return $this->hasMany(Doctor::class, 'ssn', 'ssn');
    }


   
}
