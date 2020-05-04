<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    protected $table = 'users';
    public $timestamps = false;
 	
 	public function user_role() {
 		return $this->hasMany('UserRole');
 	}
}