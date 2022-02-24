@extends('main.layout.layout')

@section('content')
 <div class="container">
     <form action="{{ route('sotre-object') }}" method="post" class="mt-5">
         @csrf
         <h5>Quel est l'objet ou quels sont les objets du partenariat ?</h5>
         <div class="form-group mt-3 mb-3">
            <label for=""></label>
            <input type="text" name="object" class="form-control" placeholder="Quel est l'objet ou quels sont les objets du partenariat ?" id="">
         </div>
         <button type="submit" class="btn btn-success">Ajouter</button>
     </form>


     <div class="container mt-3">
        <ul>
            @foreach ($objects as $object)
                <li>{{ $object->name }}</li>
            @endforeach
        </ul>
     </div>
 </div>
@endsection
