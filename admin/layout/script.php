<script src="<?=base_url?>/admin/assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url?>/admin/assets/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?=base_url?>/admin/assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="<?=base_url?>/admin/assets/js/jquery.slimscroll.js"></script>
<!--Morris JavaScript -->
<script src="<?=base_url?>/admin/assets/plugins/bower_components/raphael/raphael-min.js"></script>
<script src="<?=base_url?>/admin/assets/plugins/bower_components/morrisjs/morris.js"></script>
<!-- Sparkline chart JavaScript -->
<script src="<?=base_url?>/admin/assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- jQuery peity -->
<script src="<?=base_url?>/admin/assets/plugins/bower_components/peity/jquery.peity.min.js"></script>
<script src="<?=base_url?>/admin/assets/plugins/bower_components/peity/jquery.peity.init.js"></script>
<!--Wave Effects -->
<script src="<?=base_url?>/admin/assets/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?=base_url?>/admin/assets/js/custom.min.js"></script>
<script src="<?=base_url?>/admin/assets/js/dashboard1.js"></script>
<script src="<?=base_url?>/admin/assets/js/myscript.js"></script>
<!--Style Switcher -->
<script src="<?=base_url?>/admin/assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>


<!-- <script src="<?=base_url?>/admin/assets/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url?>/admin/assets/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url?>/admin/assets/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="<?=base_url?>/admin/assets/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="<?=base_url?>/admin/assets/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="<?=base_url?>/admin/assets/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="<?=base_url?>/admin/assets/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="<?=base_url?>/admin/assets/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [
                    { "visible": false, "targets": 2 }
                ],
                "order": [[ 2, 'asc' ]],
                "displayLength": 25,
                "drawCallback": function ( settings ) {
                    var api = this.api();
                    var rows = api.rows( {page:'current'} ).nodes();
                    var last=null;

                    api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                        if ( last !== group ) {
                            $(rows).eq( i ).before(
                                '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                            );

                            last = group;
                        }
                    } );
                }
            } );

            // Order by the grouping
            $('#example tbody').on( 'click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
                    table.order( [ 2, 'desc' ] ).draw();
                }
                else {
                    table.order( [ 2, 'asc' ] ).draw();
                }
            });
        });
    });
    $('#example23').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script> -->