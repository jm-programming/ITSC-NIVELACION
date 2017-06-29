@if(count($errors)>0)
<<<<<<< HEAD

      <div class="alert alert-danger">
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
=======
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            <span aria-hidden="true" class="glyphicon glyphicon-exclamation-sign">
            </span>
            {{ $error }}
        </li>
        @endforeach
    </ul>
</div>
@endif
>>>>>>> 537333bfd869b240529f720a6ba7d1dbcb48bd16
