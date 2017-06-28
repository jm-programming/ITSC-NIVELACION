@if(count($errors)>0)
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
