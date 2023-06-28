<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title></title>
    <style>
      * {
        font-family: arial, sans-serif;
      }
      h1 {
        font-size: 3rem;
        text-align: center;
      }
      table {
        width: 80%;
        margin: 0 auto;
        border-collapse: collapse;
      }
      th, td {
        border: solid 1px gray;
        padding: 0.5rem;
        font-size: 1.5rem;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <h1>Relatório de Equipamento</h1>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Data</th>
        </tr>
      </thead>
      <tbody>
        @foreach($equipamentos as $equipamento)
          <tr>
            <td>{{$equipamento->id}}</td>
            <td>{{$equipamento->nome}}</td>
            <td>{{$equipamento->descricao}}</td>
            <td>{{$equipamento->data}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>
