<?php 
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Http\Request;
	use App\people;
	use App\pessoa_model;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Botao</title>
</head>
<body>
 	<li class="nav-item">
 		<!-- <button href= "{{ route('cadastro') }}" type="button" >Create</button>
 		<button href= "{{ route('list') }}" type="button" >Retrice</button>
 		<button href= "{{ route('search_user') }}" type="button" >Update</button>
 		<button href= "{{ route('search_user') }}" type="button" >Delete</button> -->
 	
        <a class="nav-link" href="{{ route('cadastro') }}">{{ __('Create') }}</a>
        <a class="nav-link" href="{{ route('list') }}">{{ __('Retrive') }}</a>
        <a class="nav-link" href="{{ route('search_user') }}">{{ __('Update') }}</a>
        <a class="nav-link" href="{{ route('search_delete') }}">{{ __('Delete') }}</a>
        <a class="nav-link" href="{{ route('login_view') }}">{{ __('Login') }}</a>
    </li>
</body>
</html>