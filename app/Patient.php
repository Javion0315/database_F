<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patient';

    protected $primaryKey = 'char_no';

    protected $guarded = ['char_no'];

    protected function admits()
    {
        return $this->hasMany(Admit::class, 'char_no', 'char_no');
    }

    protected function operations()
    {
        return $this->hasMany(Operation::class, 'char_no', 'char_no');
    }
}
