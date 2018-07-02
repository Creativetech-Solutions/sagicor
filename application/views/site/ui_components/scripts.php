 
 <script src="<?=base_url()?>assets/site/js/jquery-1.12.3.min.js"></script>
 
<script src="<?=base_url();?>assets/site/js/bootstrap/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/site/js/bootstrap/bootstrap-formhelpers.min.js"></script>
 <script>


      $(document).on('keyup','input:not([type="email"])',function(e){
        var val = $(this).val();
        val = val.toLowerCase().replace(/\b[a-z]/g, function(letter) {
            return letter.toUpperCase();
        });
        $(this).val(val);
      })
</script>