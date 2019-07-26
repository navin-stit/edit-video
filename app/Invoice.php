<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

protected $table = 'invoices';


     public function items()
    {
        return $this->hasMany(Item::class, 'invoice_id');
    }
}
