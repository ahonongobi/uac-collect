@extends('main.layout.layout')

@section('content')
 <div class="container">
     <form action=" {{ route('store-type') }}" method="post" class="mt-5">
         @csrf
         <h5>
             Type de partenariat
        </h5>
         <div class="form-group mt-3 mb-3">
            <label for=""></label>
            <input type="text" name="type" class="form-control" placeholder="Type de partenariat " id="">
         </div>
         <button type="submit" class="btn btn-success">Ajouter</button>
     </form>

     <div class="container mt-3">
        <ul>
            @foreach ($types as $type)
                <li class="mt-2">{{ $type->name }} <a href="{{ route('delete-type', $type->id) }}" class="btn btn-danger btn-md active" role="button">Supprimer</a></li>

            @endforeach
        </ul>
     </div>
 </div>
@endsection
