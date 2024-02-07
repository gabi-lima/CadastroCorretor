<table border="1">
    <thead>
        <tr>
            <th>CPF</th>
            <th>Creci</th>
            <th>Nome</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dadosTabela as $registro)
            <tr>
                <td>{{ $registro->cpf }}</td>
                <td>{{ $registro->creci }}</td>
                <td>{{ $registro->nome }}</td>
            </tr>
        @endforeach
    </tbody>
</table>