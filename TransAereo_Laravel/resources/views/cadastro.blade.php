<link rel="stylesheet" href="http://localhost:8000/template/css/style.css" type="text/css">
 <html>
    <head>
    <title>ViaCEP Webservice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>
 	<script type="text/javascript">
        function ValidarCadastro()
        {
            var nome     = ValCad.nome.value;
            if (nome == "")     
            {
                alert("Insira o nome");
                return false;
            }
            var funcao   = ValCad.funcao.value;
            if (funcao == "") 
            {
                alert("Insira a funcao");
                return false;
            }
            var value    = ValCad.cpf.value;
            if (value == "")    
            {
                alert("Insira o valor");
                return false;
            }
            var endereco = ValCad.endereco.value;
            if (endereco == "") 
            {
                alert("Insira o endereco");
                return false;
            }
            var telefone = ValCad.telefone.value;
            if (telefone == "") 
            {
                alert("Insira o telefone");
                return false;
            }
            var login    = ValCad.login.value;
            if (login == "")    
            {
                alert("Insira o login");
                return false;
            }
            var senha    = ValCad.senha.value;
            if (senha == "")    
            {
                alert("Insira a senha");
                return false;
            }
        }
    </script>

    </head>
    
    <div class="center">
    <h1>Cadastro de pessoa</h1>
    <br />
    </div>
    <a href="{{ route('main') }}">Menu</a>
    <br /><br /><br /><br /><br /><br /><br />
    <body>
    <!-- Inicio do formulario -->
      <form method="POST" action="{{ route('save') }}">
      	<input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label>Nome:
        <input type="text" name="nome" size="8"></label><br />
        <label>Funcao:
        <input type="text" name="funcao" size="8"></label><br />
        <label>CPF:    
        <input type="text" name="cpf" size="8"></label><br />
        <label>Cep:
        <input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
               onblur="pesquisacep(this.value);" /></label><br />
        <label>Rua:
        <input name="rua" type="text" id="rua" size="60" /></label><br />
        <label>Bairro:
        <input name="bairro" type="text" id="bairro" size="40" /></label><br />
        <label>Cidade:
        <input name="cidade" type="text" id="cidade" size="40" /></label><br />
        <label>Estado:
        <input name="uf" type="text" id="uf" size="2" /></label><br />
        <label hidden>IBGE:
        <input name="ibge" id="ibge" size="8" type="text"/></label>
        <label>Telefone:
        <input type="text" name="telefone" size="8"></label><br />
        <label>Voo:
        <input type="text" name="voo" size="8"></label><br />
        <label>Login:
        <input type="text" name="login" size="8"></label><br />
        <label>Senha:
        <input type="text" name="senha" size="8"></label><br />

        <input type="submit" value = "Enviar" onclick="return ValidarCadastro()">
      </form>
    </body>

    </html>