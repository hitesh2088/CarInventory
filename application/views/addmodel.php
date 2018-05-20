<div class="modal fade" id="addmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Car Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
            <div class="modal-body">
                <div class="form-group form-inline">
                <input class="form-control" id="model_name" type="text" name="model_name" placeholder="Enter Model">
                <select  name="manu_id" class="form-control custom-select">
                    <option selected >Select Manufacture</option>
                    <?php
                        foreach ($manu as $key => $value) {
                            echo "<option value='".$value->manu_id."'>".$value->manu_name."</option>";
                        }
                    ?>
                </select>
                </div>
                <div class="form-group">
                    <input class="form-control" id="color" type="text" name="color" placeholder="Enter Color">
                </div>
                <div class="form-group">
                    <input class="form-control" id="manufacturing_year" type="text" name="manufacturing_year" placeholder="Enter manufacturing year">
                </div>
                <div class="form-group">
                    <input class="form-control" id="registration_number" type="text" name="registration_number" placeholder="Enter registration number">
                </div>
                <div class="form-group">
                    <input class="form-control" id="note" type="text" name="note" placeholder="Enter note">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submit_model" >Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#submit_model').click(function(){
        var formData = $( "form" ).serializeArray();
        $.ajax({
            type:'POST',
            url:'<?=site_url('home/addmodel') ?>',
            data:{formData},
            success:function(data){
                $('#addmodel').modal('hide');
                window.location.reload();
            },
            error:function(error){
                console.log(error);
                $('#addmodel').modal('hide');
                alert('Model is not added')
            }
        });
    })
</script>