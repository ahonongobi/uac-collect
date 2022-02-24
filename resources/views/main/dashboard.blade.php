@extends('main.layout.layout')

@section('content')

    <p><table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Intitulé</th>
            <th scope="col">Type de partenariat</th>
            <th scope="col">Objet de partenariat</th>
            <th scope="col">Date de création</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>Otto</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>Otto</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table></p>
@endsection
