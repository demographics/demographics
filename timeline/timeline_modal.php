<div id="timeline_modal" class="modal fade">
    <div class="modal-backdrop fade in"></div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 id="myLargeModalLabel" class="modal-title">Timeline</h4>
            </div>
            <div id="timeline_modal_body" class="modal-body"> <?php include 'timeline_contents.php'?> </div>
        </div>
    </div>
</div>

<script>
$(function(){
    $('#timeline_modal #timeline_modal_body').slimScroll({
        height: '500px'
    });
});
</script>