<script type="text/javascript">

$(document).ready(function() {
     $('.dataTables_filter').addClass('pull-right');
    $('.category').DataTable( {
        destroy: true,
        dom: 'Bfrtip',
        buttons: [
           {
                    text: '+New',
                    className: 'orange, btn btn-info',
                     action: function (e, dt, node, config)
                        {
                            
                           window.location='<?php echo base_url(); ?>pos/new_category';
                           
                        }
                },
           'excel', 'pdf'
        ]
    } );
        $('.table1').DataTable( {
        destroy: true,
        dom: 'Bfrtip',
        buttons: [
          /* {
                    text: '+New',
                    className: 'orange, btn btn-info',
                     action: function (e, dt, node, config)
                        {
                            
                           window.location='<?php echo base_url(); ?>pos/new_category';
                           
                        }
                },*/
           'excel', 'pdf'
        ]
    } );

     $('.activity').DataTable( {
        destroy: true,
        dom: 'Bfrtip',
        buttons: [
           {
                    text: '+New',
                    className: 'orange, btn btn-info',
                     action: function (e, dt, node, config)
                        {
                            
                           window.location='<?php echo base_url(); ?>pos/new_activity';
                           
                        }
                },
           'excel', 'pdf'
        ]
    } );

     $('.material').DataTable( {
        destroy: true,
        dom: 'Bfrtip',
        buttons: [
           {
                    text: '+New',
                    className: 'orange, btn btn-info',
                     action: function (e, dt, node, config)
                        {
                            
                           window.location='<?php echo base_url(); ?>pos/new_material';
                           
                        }
                },
           'excel', 'pdf'
        ]
    } );
          $('.owner').DataTable( {
        destroy: true,
        dom: 'Bfrtip',
        buttons: [
           {
                    text: '+New',
                    className: 'orange, btn btn-info',
                     action: function (e, dt, node, config)
                        {
                            
                           window.location='<?php echo base_url(); ?>pos/new_owner';
                           
                        }
                },
           'excel', 'pdf'
        ]
    } );
     
          $('.pos').DataTable( {
        destroy: true,
        dom: 'Bfrtip',
        buttons: [
           {
                    text: '+New',
                    className: 'orange, btn btn-info',
                     action: function (e, dt, node, config)
                        {
                            
                           window.location='<?php echo base_url(); ?>pos/new_pos';
                           
                        }
                },
           'excel', 'pdf'
        ]
    } );
     
          $('.user').DataTable( {
        destroy: true,
        dom: 'Bfrtip',
        buttons: [
           {
                    text: '+New',
                    className: 'orange, btn btn-info',
                     action: function (e, dt, node, config)
                        {
                            
                           window.location='<?php echo base_url(); ?>user/new_user';
                           
                        }
                },
           'excel', 'pdf'
        ]
    } );
          $('.rate').DataTable( {
        destroy: true,
        dom: 'Bfrtip',
        buttons: [
           {
                    text: '+New',
                    className: 'orange, btn btn-info',
                     action: function (e, dt, node, config)
                        {
                            
                           window.location='<?php echo base_url(); ?>pos/new_rate';
                           
                        }
                },
           'excel', 'pdf'
        ]
    } );
          $('.size').DataTable( {
        destroy: true,
        dom: 'Bfrtip',
        buttons: [
           {
                    text: '+New',
                    className: 'orange, btn btn-info',
                     action: function (e, dt, node, config)
                        {
                            
                           window.location='<?php echo base_url(); ?>pos/new_size';
                           
                        }
                },
           'excel', 'pdf'
        ]
    } );


    $('.dataTables_filter').addClass('pull-right');

    //activities Add
    /*charges row script */
    $(".activitybtn").click(function () {
      
      
        if ( $("#activity").val() !='')
        { 

          var activity_id=$("#activity").val();  
          var dataString='activity='+activity_id;

           var check='';
  var inputs=$(".activity_check");
  if (inputs.length > 0){
  for(var i = 0; i < inputs.length; i++){
  if ($(inputs[i]).val()===activity_id) check=1;

  }
    } 
             if (check===''){

              $.ajax({         
              url:'<?php echo base_url(); ?>pos/get_activity',

              type:"POST",
               dataType: 'json',
               data:dataString,
              cache: true,
              success: function(data)
              {
                
                     var row = $(".activity_add").find('tr:last');
        $('<tr><td>'+data.id+'<input type="hidden" name="activity[]" class="activity_check" value="'+data.id+'" ></td><td>'+data.name+'</td><td width="20%"><input type="button" class="remove" style="color:red;" value="X" /></td></tr>').insertAfter(row);
                      $("#activity").val('');
              }

              });

            }else{
               
               alert('Repeated charge');

            }

        }
        return false;
    });
        $('.activity_add,.table44').on('click', '.remove', function(){
        $(this).closest('tr').remove();
    });
/*end of charge row */
$('#pos_form').submit(function () {

    // Get the Login Name value and trim it
     var inputs=$(".activity_check");
     var check='';
  if (inputs.length > 0){
  for(var i = 0; i < inputs.length; i++){
  if ($(inputs[i]).val()===activity_id) check=1;

  }}
    // Check if empty of not
    if (check  ==='') {
        alert('Select an Activity');
        return false;
    }
});
} );

    </script>