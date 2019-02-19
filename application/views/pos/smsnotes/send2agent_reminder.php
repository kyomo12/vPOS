<div class="col-md-12">
  <h3>Reminder</h3>
</div>
<form class="edit" method="post">
  <?php foreach ($list as $key ):?>
  
  <div class="form-group col-md-8">
    <label for="formGroupExampleInput">AGENT</label>
    <input type="text" VALUE="KHAMISI" value="n<?php echo $key->first_name.' '.$key->last_name ?>" class="form-control col-md-6" id="formGroupExampleInput" placeholder="Example input">
  </div>
  <div class="form-group col-md-8">
    <label for="formGroupExampleInput2">SMS[REMINDER]</label>

    <textarea class="form-group" readonly cols="50" rows="6"><?php echo $key->msg; ?></textarea>
  </div>
  <div class="form-group col-md-6">
     <input type="hidden" id="id" name="id" value="<?php echo $key->id; ?>">
     <input type="hidden" name="reminder" value="<?php echo $key->no_reminders; ?>">
     <?php endforeach;?>
    <input type="submit" class=" btn btn-info" value="SEND" id="formGroupExampleInput2" placeholder="Another input">
  </div>


</form>

<script>


$('.edit').submit( function (ev) {
    ev.preventDefault();

  
  if($('#id').val() == ''){
      alert('id  is required');
      ev.preventDefault();
               return false;
   }
else {

 var $body = $("body");

      $.ajax({
      type: "POST",
      url: '<?php echo base_url(); ?>report/send_reminder',
      data:$('.edit').serialize(),
      
      success:  function(data){

        location.reload();
      }

    });
    return;

   }
});

</script> 