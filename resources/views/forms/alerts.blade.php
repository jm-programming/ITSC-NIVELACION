
@section('script')
<script>

        setTimeout(function() {
            $('#Warning').fadeToggle();
            }, 2000); // <-- time in milliseconds

        setTimeout(function() {
            $('#Success').fadeToggle();
            }, 2000); // <-- time in milliseconds


        $('#Datepicker').datetimepicker({
            format: 'hh:mm A'
             });

$(document).ready(inicializar);


function inicializar(){
    var x;
    x = $("#cedula").click(cedula);
    x = $("#pasaporte").click(pasaporte);

    $('#cellphone').inputmask({"mask": "(999)-999-9999"})
    $('#personal_phone').inputmask({"mask": "(999)-999-9999"})
    $('#office_phone').inputmask({"mask": "(999)-999-9999"})
    $("#identity_card").inputmask({"mask": "999-9999999-9"});
}

function cedula(){
    $("#identity_card").inputmask({"mask": "999-9999999-9"});
}

function pasaporte(){
    $("#identity_card").inputmask({"mask": "99999999999"});
}
  </script>
  
@endsection

