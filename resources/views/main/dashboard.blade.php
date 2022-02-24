@extends('main.layout.layout')

@section('content')

    <p><table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Intitulé</th>
            <th scope="col">Type de partenariat</th>
            <th scope="col">Objet de partenariat</th>
            <th scope="col">Année de signature</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($partners as $partner)
            <tr>
                <th scope="row">1</th>
                <td>{{ $partner->name }}</td>
                <td>{{ $partner->type }}</td>
                <td>{{ $partner->partnership_purpose }}</td>
                <td>{{ $partner->year_signature }}</td>
                <td></td>
            </tr>
            @endforeach


        </tbody>
      </table></p>
@endsection
