<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory_expense extends Model
{
    protected $table = 'inventoryexpenses';
    public $primaryKey = 'invoiceID';
    public $timestamps = true;
}
