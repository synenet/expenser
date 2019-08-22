<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //
    protected $fillable = ['userId', 'date', 'reason', 'value', 'vat'];
}
