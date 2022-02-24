@extends('main.layout.layout')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('content')

    <div class="container">
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
            @foreach ($partners as $key => $partner)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $partner->name }}</td>
                <td>{{ $partner->type }}</td>
                <td>{{ $partner->partnership_purpose }}</td>
                <td>{{ $partner->year_signature }}</td>
                <td class="d-flex">
                  <th>
                    <a  href="sqfdsrf"><i class="fa fa-trash text-danger"></i></a>
                  </th>
                  
                  <th>
                    <a  href="/see"><i class="fa fa-eye text-success"></i></a>
                  </th>
                  
                  
                </td>
            </tr>
            @endforeach


        </tbody>
      </table></p>
    </div>
@endsection
