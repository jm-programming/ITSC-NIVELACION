
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
    
   
       $(document).ready(tocar);

            
            function tocar (){
                var = x;
                x = $("#cedula").click(mascara);
            }
            
            function mascara(){
                $('#identity_card').inputmask({"mask": "999-9"})
            }

 
</script>

