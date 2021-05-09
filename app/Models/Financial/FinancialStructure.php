<?php

namespace App\Models\Financial;

use Illuminate\Database\Eloquent\Model;

class FinancialStructure extends Model
{   
    protected $connection = 'mysql';
    protected $table = 'financial_structures';
}
