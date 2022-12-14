$('.patsTable').DataTable({
  "ajax": "ajax/patients.ajax.php",
  "deferRender": true,
  "retrieve": true,
  "processing": true,
  initComplete: function () {
    this.api().columns( 6 ).every( function () {
        var column = this;
        var select = $('<select class="form-control filterPet"><option value="">All</option></select>')
            .appendTo( $(column.footer()).empty() )
            .on( 'change', function () {
                var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                );

                column
                    .search( val ? '^'+val+'$' : '', true, false )
                    .draw();
            } );

        column.data().unique().sort().each( function ( d, j ) {
            select.append( '<option value="'+d+'">'+d+'</option>' )
        } );
    } );
  }
});

function editAppt(id)
{
  // var idPat = $(this).attr("idPat");
  window.location = "index.php?route=edit-appt&idPat="+id;
}

$(".patsTable").on("click", "tbody .btnDeleteAppt", function(){
	var idPat = $(this).attr("idPat");
	swal({
        title: 'Do you want to delete this pet?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancel',
        confirmButtonText: 'Yes'
      }).then(function(result){
        if (result.value) {
            window.location = "index.php?route=pets&idPet="+idPat;
        }
  })
})
