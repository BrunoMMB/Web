<?php
/*https://www.cloudways.com/blog/models-views-laravel/*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class pessoa_model extends Model
{	
	protected $table = 'people';
	protected  $primaryKey = 'pessoa';
	//public $incrementing = false;
	protected $fillable = ['pessoa', 'nome', 'funcao', 'cpf', 'telefone', 'login', 'senha', 'rua', 'bairro', 'cidade', 'estado', 'cep'];
}
