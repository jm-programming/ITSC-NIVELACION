@extends('layouts.landingPage')
@section('title', 'Citas')
@section('content')


<div class="container">

            <p> Fecha de la Cita <span>{{ $language->date }}</span></p> 
            <p>Ubicación <span> {{ $language->location }}</span></p>
            <p>Hora <span>{{ $language->time }}</span></p>
            
       
</div>

@endsection

@section('script')
<script>
  $(document).ready(inicio);
  
  function inicio(){
    window.print();
   
  }
</script>

@endsection
   