<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*returning html*/
// class ProdutosController extends Controller
// {
// 	public function index()
// 	{
// 		return "ProdutosController Index Successfull";
// 	}
// }

/*returning json*/
// class ProdutosController extends Controller
// {
// 	public function index()
// 	{
// 		$dados = ['ola'=>'mundo'];
// 		return $dados;
// 	}
// }

/*Chamando view que pode ser criada a mão*/
class ProdutosController extends Controller {

 public function index()
 {
	$nome = 'Bruno';
 	return view('produtos' , ['nome'=>$nome]);
 }
}