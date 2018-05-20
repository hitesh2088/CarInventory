<div class="modal fade" id="addmanufacture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Manufacture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <input class="form-control" id="manufacturername" type="text" name="manufacturer" placeholder="Enter Manufacturer">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submit_manu" >Save changes</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#submit_manu').click(function(){
        var manufacturer = $('#manufacturername').val();
        $.ajax({
            type:'POST',
            url:'<?=site_url('home/addmanufacture') ?>',
            data:{manu_name:manufacturer},
            success:function(data){
                $('#addmanufacture').modal('hide');
                window.location.reload();
            },
            error:function(error){
                console.log(error);
                $('#addmanufacture').modal('hide');
                alert('Manufacturer is not added')
            }
        });
    })
    
</script>