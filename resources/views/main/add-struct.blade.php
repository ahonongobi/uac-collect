@extends('main.layout.layout')

@section('content')
 <div class="container">
     <form action="{{ route('store-struct') }}" method="post" class="mt-5">
        @csrf
         <h5>Structures du Rectorat impliquées </h5>
         <div class="form-group mt-3 mb-3">
            <label for=""></label>
            <input type="text" name="uac_structure" class="form-control" placeholder="Structures du Rectorat impliquées " id="">
         </div>
         <button type="submit" class="btn btn-success">Ajouter </button>
     </form>
     <div class="container mt-3">
        <ul>
            @foreach ($uac_structures as $uac_structure)
                <li>{{ $uac_structure->name }}</li>
            @endforeach
        </ul>
     </div>
 </div>

@endsection
