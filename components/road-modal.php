<div id="road-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Post road</h4>
            </div>
            
            <form id="road_post" name='road_post' action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <fieldset>
                    <div class="modal-body">
                        <img height="350px" width="550px" class="road-preview" alt="Road on map" title="Road on map"/>
                        
                         <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Road name&nbsp;</span>
                                <input id="road-input" name="road-input" class="form-control" placeholder="Road's name goes here." type="text">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" >Post</button>
                        </div>
                    </div>
                    
                </fieldset>
            </form>
            
        </div>
    </div>
</div>

<script>       
    

    
    $(document).ready(function(){
    
        $("form[name='road_post']").submit(function(e) {
            saveRoad(road,$('#road-input').val());
            $.each(actualMarker.markers, function( index, value ) {
                value.setMap(null);
            });
            
            road={'markers':[]};
            actualMarker={'markers':[]};
            
            $("#road-modal").modal('toggle');
            e.preventDefault();
        });
            
        
        $('#road-modal').on('shown.bs.modal', function () {
            $('#road-input').focus();
        });
        
        $('#marker-modal').on('hide.bs.modal', function () {            
            $('#road-input').val("");
        });
             
    });
</script>
