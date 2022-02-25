@extends('main.layout.layout')
<style>
  table {
  width: 100%;
  border-collapse: collapse;
  margin: 50px auto;
  overflow-x: hidden;
  overflow-y: auto;
  text-align:justify;
}

/* Zebra striping */
tr:nth-of-type(odd) {
  background: #eee;
}

th {
  background: #2a8c28;
  color: white;
  font-weight: bold;
}

td,
th {
  padding: 10px;
  border: 1px solid #ccc;
  text-align: left;
  font-size: 18px;
}


@media only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px) {
  table {
    width: 100%;
  }

  /* Force table to not be like tables anymore */
  table,
  thead,
  tbody,
  th,
  td,
  tr {
    display: block;
  }

  
  thead tr {
    position: absolute;
    top: -9999px;
    left: -9999px;
  }

  tr {
    border: 1px solid #ccc;
  }

  td {
    
    border: none;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-left: 50%;
  }

  td:before {
    /* Now like a table header */
    position: absolute;
    /* Top/left values mimic padding */
    top: 6px;
    left: 6px;
    width: 45%;
    padding-right: 10px;
    white-space: nowrap;
    /* Label the data */
    content: attr(data-column);

    color: #000;
    font-weight: bold;
  }
}

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('content')

    <div class="container">
      <p class="d-none"><table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Intitulé</th>
            <th scope="col">Type de partenariat</th>
            <th scope="col">Objet de partenariat</th>
            <th scope="col">Année de signature</th>
            <th scope="col">Actions sur la ligne</th>
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

      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Intitulé</th>
            <th>Type partenariat</th>
            <th>Objet partenariat</th>
            <th>Année de signature</th>
            <th>Actions sur la ligne</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($partners as $partner)
          <tr>
            <td data-column="First Name">{{ $partner->id }}</td>
            <td data-column="Last Name">{{ $partner->name }}</td>
            <td data-column="Job Title">Chief Sandwich Eater</td>
            <td data-column="Twitter">{{ $partner->partnership_purpose }}</td>
            <td data-column="Twitter">{{ $partner->year_signature }}</td>
            <td data-column="Twitter" class="d-flex justify-content-between">
              
                <a  href="sqfdsrf"><i class="fa fa-trash text-danger"></i></a>
              
              
              
                <a  href="/see"><i class="fa fa-eye text-success"></i></a>
              
            </td>
          </tr>
          @endforeach
          
          
        </tbody>
      </table>
    </div>
@endsection
