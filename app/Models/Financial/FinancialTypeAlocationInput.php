<?php

namespace App\Models\Financial;

use Illuminate\Database\Eloquent\Model;

class FinancialTypeAlocationInput extends Model
{   
    protected $connection = 'mysql';
    protected $table = 'financial_type_allocation_inputs';
}
