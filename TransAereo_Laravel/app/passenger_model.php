<?php
/*https://www.cloudways.com/blog/models-views-laravel/*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class passenger_model extends Model
{	
	protected $table = 'passenger';
	protected  $primaryKey = 'pessoa';
	//public $incrementing = false;
	protected $fillable = ['pessoa','voo'];
}