<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    //
    protected $table = 'operation';

    protected $primaryKey = 'op_id';

    protected function patient()
    {
        return $this->belongsTo(Patient::class, 'char_no', 'char_no');
    }

    protected function operate()
    {
        return $this->hasMany(operate::class, 'op_id', 'op_id');
    }
}
