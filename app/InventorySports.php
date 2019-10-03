<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventorySports extends Model
{
    protected $table = 'inventory_sports';

    public $primaryKey = 'productID';
    public $timestamps =true;
}
