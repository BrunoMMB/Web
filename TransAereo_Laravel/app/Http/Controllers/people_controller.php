<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\config\session;
use App\people;
use App\pessoa_model;
use App\flight_model;
use App\passenger_model;

class people_controller extends Controller
{    
    public function index2()
    {   
        
        $user = pessoa_model::all();
        return view ('botao', ['user'=>$user]);
    }
    
    /********************** USER login*******************************/
    public function autentication(Request $request)
    {    
        $user = new pessoa_model;
        $user->login = $request->input('login');
        $user = DB::table('people')->where('login', $user->login)->first();

        if(!$user) 
        {
            return "User nao encontrado";
        }

        if($user->senha == $request->input('pass'))
        {
            if($user->funcao == "ADM")
            {
                $request->session()->put('user_agent', "ADM");
                session(['nome' => $user->nome]); 
            }
            else{
                $request->session()->put('user_agent', $request->login); 
                session(['nome' => $user->nome]);
                session(['pessoa' => $user->pessoa]);
            }
            $request = $request->session()->get('user_agent');
            return view('temp/index',['request'=>$request]);
        }

        if($user->senha != $request->input('pass'))
        {
            return "Usuario ou senha incorretos";
        }
    }

   /********************** CREATE USER *******************************/
    public function fullfil_register(Request $id)
    {
        if($id->session()->get('user_agent') == "")
        {
            return view ('login_view');
        }
        else{
            if($id->session()->get('user_agent') != "ADM")
            {
                return "Voce não é um administrador.";
            }
            else
            {
                return view('cadastro');
            }
        }
    }
    public function save_register(Request $request)
    {
        $passenger = new passenger_model;
        $user = new pessoa_model;
        $flight = new flight_model;
        $flight = flight_model::find($request->input('voo'));
        $user->nome      = $request->input('nome');
        $user->funcao    = $request->input('funcao');
        $user->cpf       = $request->input('cpf');
        $user->telefone  = $request->input('telefone');
        $user->login     = $request->input('login');
        $user->senha     = $request->input('senha');
        $user->cep       = $request->input('cep');
        $user->rua       = $request->input('rua');
        $user->cidade    = $request->input('cidade');
        $user->estado    = $request->input('uf');
        $user->bairro    = $request->input('bairro');        

        $cpfcheck = DB::table('people')->where('cpf', $request->input('cpf'))->first();
        if($cpfcheck)
        {
            return "Este cpf já existe";
        }

        $user->save();
        if(!$request->input('voo'))
        {
            $passenger->voo    = "";
            $passenger->pessoa = "";    
        }
        else
        {   
            if(!$flight)
            {
                return "Este voo não existe";
            }
            $passenger->voo    = $request->input('voo');
            $passenger->pessoa = $user->pessoa;
            $passenger->save();
        }

        //echo "Deu certo";
        //sleep(3);
        return redirect('list');
    }
/********************** RETRIVE USER *********************************/
    public function peopleList(Request $request)
    {   
        if($request->session()->get('user_agent') == "")
        {
            return view ('login_view');
        }
        if($request->session()->get('user_agent') != "ADM")
        {
            return "Voce não é um administrador.";
        }
        if($request->session()->get('user_agent') == "ADM")
        {
            $pessoas = DB::table('people as pp')
            ->leftJoin('passenger as ps', 'ps.pessoa', '=', 'pp.pessoa')
            ->leftJoin('flight as fl', 'ps.voo', '=', 'fl.voo')
            ->select('pp.pessoa', 'pp.nome', 'pp.funcao', 'pp.cpf', 
                     'pp.telefone', 'pp.login', 'pp.estado',
                     'pp.rua', 'pp.bairro', 'pp.cidade',
                     'ps.voo', 'ps.pessoa',
                     'fl.horario', 'fl.companhia', 'fl.port_embarque')
            ->orderBy('pp.pessoa', 'asc')
            ->get();
        
            return view ('lista', ['pessoas'=>$pessoas]);
        }
    }
/********************** UPDATE USER ***********************************/
    public function update_search_user(Request $id)
    {
        if($id->session()->get('user_agent') == "")
        {
            return view ('login_view');
        }
        else{
            /*Caso a pessoa nao for administradora */
            if($id->session()->get('user_agent') != "ADM")
            {
                $value = session('pessoa');
                $user = pessoa_model::find($value);
                $passenger = passenger_model::find($value);
                return view ('user_update', ['user'=>$user,'passenger'=>$passenger->voo]);
            }
            if($id->session()->get('user_agent') == "ADM")
            {
                return view ('user_search');    
            }
        } 
    }

    public function choose_update(Request $id)
    {
        $user = new pessoa_model;
        $user = pessoa_model::find($id->input('id'));
        
        $passenger = new passenger_model;
        $passenger = DB::table('passenger')->where('pessoa', $user->pessoa)->first();

        if (!$passenger) {
            $passageiro = "";
        }
        if ($passenger) {
            $passageiro = $passenger->voo;
        }
        if($id->session()->get('user_agent') == "ADM") 
        {
            return view ('adm_update', ['user'=>$user,'passenger'=>$passageiro]);
        }
    }
    
    public function user_up(Request $request)
    {  
        $user = new pessoa_model;
        $user = pessoa_model::find($request->input('pessoa'));
        $passenger = new passenger_model;
        $passenger = passenger_model::find($request->input('pessoa'));

        $user->nome      = $request->input('nome');
        $user->funcao    = $request->input('funcao');
        $user->cpf       = $request->input('cpf');
        $user->telefone  = $request->input('telefone');
        $user->login     = $request->input('login');
        $user->senha     = $request->input('senha');
        $user->rua       = $request->input('rua');
        $user->bairro    = $request->input('bairro');
        $user->estado    = $request->input('uf');
        $user->cep       = $request->input('cep');
        $user->cidade    = $request->input('cidade');

        if($request->input('voo'))
        {   
            $voo = $request->input('voo');
            $pessoa = $request->input('pessoa');
            
            if($passenger)
            {   
                $query = DB::table('passenger')
                ->where('pessoa', $request->input('pessoa'))
                ->update(['voo' => $voo, 'pessoa' => $pessoa]);
            }
            if(!$passenger)
            {
               DB::table('passenger')->insert(['voo'=>$voo, 'pessoa'=>$pessoa]);
            }
            
        }
        if(!$request->input('voo'))
        {
            if($passenger)
            {
                $passenger->delete();
            }
        }

        $user->save();

        if($request->session()->get('user_agent') != "ADM")
        {
            return redirect()->route('main');
        }
        else
        {
            return redirect()->route('list');
        }
    }

/********************** DELETE USER ***********************************/
  public function delete_search_user(Request $id)
  {
    if($id->session()->get('user_agent') == "")
    {
        return view ('login_view');
    }
    else if($id->session()->get('user_agent') == "ADM")
    {
        return view ('user_delete');
    }    
    else if($id->session()->get('user_agent') != "ADM")
    {
        return "Voce nao tem permicao pra alterar";
    }    
  }
  public function delete_user(Request $request)  
  {
    $user = new pessoa_model;
    $user = pessoa_model::find($request->input('pessoa'));
    //echo $user;
    //echo $request->input('pessoa');
    $user->delete();
    return redirect()->route('list');
  }

}
