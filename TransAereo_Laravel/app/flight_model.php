<?php
/*https://www.cloudways.com/blog/models-views-laravel/*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class flight_model extends Model
{	
	protected $table = 'flight';
	protected  $primaryKey = 'voo';
	//public $incrementing = false;
	protected $fillable = ['voo', 'horario', 'companhia', 'port_embarque'];
}