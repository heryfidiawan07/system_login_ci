<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;

class UserRole extends Eloquent
{
    protected $table = 'user_role';
    public $timestamps = false;

    public function role() {
    	return $this->belongsTo('Role');
    }
    
}