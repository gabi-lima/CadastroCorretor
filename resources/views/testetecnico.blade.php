<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            margin-top: 50px;
        }
        form {
            max-width: 400px;
            margin: auto;
        }
        
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        td:hover{
            background-color: #b1b1b1;
        }
        .acao-buttons button {
            margin-right: 5px;
            cursor: pointer;
        }

        h1 {
            margin: 100px;
            font-size: 50px;
        }
        
    </style>
</head>
<body>
    <h1 id= "tituloH1">Cadastro de Corretor</h1>

    <form id="formularioCadastro" action="{{ url('/') }}" method="post" onsubmit="return validarFormulario()">
        @csrf
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" placeholder="Digite o CPF: " maxlength="11"  type="number" required>

        <label for="creci">CRECI:</label>
        <input type="text" id="creci" name="creci" placeholder="Digite o CRECI: " maxlength="8"  type="number" required>

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" placeholder="Digite o Nome: " maxlength="20" required>

        <button type="submit" id="botaoEnviar">Enviar</button>
    </form>

    <table border="1" id="tabelaRegistros">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Creci</th>
            <th>CPF</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dadosTabela as $registro)
            <tr>
                <td>{{ $registro->id }}</td>
                <td>{{ $registro->nome }}</td>
                <td>{{ $registro->creci }}</td>
                <td>{{ $registro->cpf }}</td>
                <td class="acao-buttons">
                        <button onclick="editarRegistro('{{ $registro->id }}')">Editar</button>
                        <button onclick="excluirRegistro('{{ $registro->id }}')">Excluir</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    <script>
        function validarFormulario() {
            var cpf = document.getElementById("cpf").value;
            var creci = document.getElementById("creci").value;
            var nome = document.getElementById("nome").value;

            // Validar CPF com 11 caracteres
            if (cpf.length !== 11) {
                alert("O CPF deve ter 11 caracteres (apenas números).");
                return false;
            }

            // Validar Creci e Nome com pelo menos 2 caracteres
            if (creci.length < 2 || nome.length < 2) {
                alert("Creci e Nome devem ter pelo menos 2 caracteres.");
                return false;
            }

            // Se todas as validações passarem, permitir o envio do formulário
            return true;
        }
        function editarRegistro(id) {
            // Alterar o título h1
            document.getElementById('tituloH1').innerText = 'Editar Cadastro';

            // Alterar o título do botão
            document.getElementById('botaoEnviar').innerText = 'Salvar';

            // Ocultar a tabela
            document.getElementById('tabelaRegistros').style.display = 'none';

            // Recuperar os dados do registro correspondente
            var registros = {!! json_encode($dadosTabela) !!};
            var registro = registros.find(registro => registro.id == id);

            // Preencher os campos do formulário com os dados do registro
            document.getElementById('cpf').value = registro.cpf;
            document.getElementById('creci').value = registro.creci;
            document.getElementById('nome').value = registro.nome;

            // Atualizar o formulário de ação para apontar para a rota de atualização do registro
            document.getElementById('formularioCadastro').action = "{{ url('/atualizar-registro') }}/" + id;
        }   

        function excluirRegistro(id) {
            if (confirm("Tem certeza que deseja excluir este registro?")) {
                // Redirecionar para a rota de exclusão
                window.location.href = "{{ url('/excluir-registro') }}/" + id;
            }
        }
    </script>

</body>
</html>