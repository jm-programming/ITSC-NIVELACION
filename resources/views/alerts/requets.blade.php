<<<<<<< HEAD
@if(count($errors)>0)
=======
@if(count($errors) > 0)
>>>>>>> Development
      <div class="alert alert-danger" id="Warning">
      	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <ul>
         @foreach($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
          @endforeach
        </ul>
    </div>

@endif
<<<<<<< HEAD
@section('script')
@include('forms.alerts')

@endsection

=======
@include('forms.alerts')

>>>>>>> Development
