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



    $('.dataTables_filter').addClass('pull-right');
} );

    </script>