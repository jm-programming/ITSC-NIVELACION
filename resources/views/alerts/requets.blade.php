@if(count($errors)>0)

      <div class="alert alert-danger" role="alert">

        <ul>
         @foreach($errors->all() as $error)
            <li > <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                {{ $error }}
            </li>
          @endforeach
        </ul>
    </div>


@endif

