<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormDana extends Model
{
    //
    protected $table = 'form_dana';
    
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
}
