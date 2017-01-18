<?php

namespace suvinando;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
    protected $fillable = array('description','amount', 'invoice_id');
    protected $guarded = ['id'];

    public function invoice(){
        return $this->belongsTo('suvinando\Invoice');
    }
}
