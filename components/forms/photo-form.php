<div class="form-group">
    <label class="control-label" for="photo-description-input">Description</label>
    <div>                     
        <textarea placeholder="Photo's description goes here." class="form-control" id="photo-description-input" name="photo-description-input"></textarea>
    </div>
</div>

<div class="form-group">
    <label class="control-label" for="photo-input">Pick an image</label>
    
    <div class="file-input file-input-new">
        <div class="input-group ">
            <div class="form-control file-caption data-preview-file-type="any" ">
                <span class="glyphicon glyphicon-file"></span>
                <span class="file-caption-name" id="info" title=""></span>
            </div>
            <div class="input-group-btn">
                <div class="btn btn-primary btn-file">
                    <i class="glyphicon glyphicon-folder-open"></i>
                    Browse
                     <input type="file" name="file[]" id="fileInput" multiple="multiple" onchange="GetFileInfo ()"/>
                </div>
            </div>
        </div>
    </div>
    <div id="photo-container">
        <img height="100%" width="100%" id="photo-preview" src="#" alt=""></img>
    </div>

</div>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#photo-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#fileInput").change(function(){
        readURL(this);
    });

    function GetFileInfo () {
        var fileInput = document.getElementById ("fileInput");
        var tooltip="";
        var message = "";

        if ('files' in fileInput) {
            if (fileInput.files.length == 0) {
                message = "Please browse for one or more files.";
            } else if (fileInput.files.length <5) {
                for (var i = 0; i < fileInput.files.length; i++) {
                    var file = fileInput.files[i];
                    if(i==0)
                        message=file.name;
                    else
                        message+=", "+file.name;
                }
            } else{
                message=fileInput.files.length+" files selected.";
                for (var j = 0; j < fileInput.files.length; j++) {
                    var file = fileInput.files[j];
                    if(j==0)
                        tooltip=file.name;
                    else
                        tooltip+=", "+file.name;
                }
            }
        } 
        $( "#info" ).tooltip({ content: tooltip });
        var info = document.getElementById ("info");
        info.innerHTML = message;
    }
</script>
