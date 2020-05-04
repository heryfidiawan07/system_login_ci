<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;

class Role extends Eloquent
{
    protected $table = 'roles';
    public $timestamps = false;
    
}