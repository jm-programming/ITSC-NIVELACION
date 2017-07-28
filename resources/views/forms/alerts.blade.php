
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
    
        $(document).ready(function(){
            $('#identity_card').inputmask({"mask": "999-9999999-9"})
            $('#cedula').inputmask({"mask": "999-999-9"})
            $('#pasaporte').inputmask({"mask": "999-9999999-9"})
            $('#cellphone').inputmask({"mask": "999-999-9999"})
            $('#personal_phone').inputmask({"mask": "999-999-9999"})
            $('#office_phone').inputmask({"mask": "999-999-9999"})
        });
  </script>


