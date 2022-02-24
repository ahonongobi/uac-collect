@extends('main.layout.layout')

@section('content')
 <div class="container">
     <form action=" {{ route('store-formation') }}" method="post" class="mt-5">
         @csrf
         <h5>
             Unités de formation et de Recherche impliquées
        </h5>
         <div class="form-group mt-3 mb-3">
            <label for=""></label>
            <input type="text" name="formation" class="form-control" placeholder="Unités de formation et de Recherche impliquées " id="">
         </div>
         <button type="submit" class="btn btn-success">Ajouter</button>
     </form>

     <div class="container mt-3">
        <ul>
            @foreach ($formations as $formation)
                <li>{{ $formation->name }}</li>
            @endforeach
        </ul>
     </div>
 </div>
@endsection
