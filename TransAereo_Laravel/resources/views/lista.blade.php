<!-- lista os dados do voo da pessoa -->
<link rel="stylesheet" href="http://localhost:8000/template/css/style.css" type="text/css">

<div class="center">
	<h1>Usuários</h1>
</div>


 <table>
 <thead>
 <tr>
 <th>ID</th>
 <th>nome</th>
 <th>funcao</th>
 <th>cpf</th>
 <th>telefone</th>
 <th>login</th>
 <th>Voo</th>
 <th>Hora</th>
 <th>Companhia</th>
 <th>Portão</th>
 <th>rua</th>
 <th>bairro</th>
 <th>cidade</th>
 <th>estado</th>
 </tr>
 </thead>
 <tbody>
@foreach ($pessoas as $k=>$product)
 <tr>
 <td>{{ $product->pessoa }}</td>
 <td>{{ $product->nome }}</td>
 <td>{{ $product->funcao }}</td>
 <td>{{ $product->cpf }}</td>
 <td>{{ $product->telefone }}</td>
 <td>{{ $product->login }}</td>
 <td>{{ $product->voo }}</td>
 <td>{{ $product->horario }}</td>
 <td>{{ $product->companhia }}</td>
 <td>{{ $product->port_embarque }}</td>
 <td>{{ $product->rua }}</td>
 <td>{{ $product->bairro }}</td>
 <td>{{ $product->cidade }}</td>
 <td>{{ $product->estado }}</td>
 </tr>
 @endforeach


<a href="{{ route('main') }}">Menu</a>

 </tbody>
</table>
