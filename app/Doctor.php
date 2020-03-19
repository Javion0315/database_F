<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    protected $table = 'doctor';

    protected $primaryKey = 'ssn';

    protected $guarded = ['ssn'];

    protected function operate()
    {
        return $this->hasMany(operate::class, 'ssn', 'doc_ssn');
    }
    protected function operation()
    {
        return $this->belongsTo(Operation::class, 'ssn', 'ssn');
    }
}

