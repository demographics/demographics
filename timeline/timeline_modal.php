<div id="timeline_modal" class="modal fade bs-example-modal-lg in" aria-hidden="false" aria-labelledby="myLargeModalLabel" role="dialog" tabindex="-1" style="display: block; padding-right: 17px;">
    <div class="modal-backdrop fade in" style="height: 609px;"></div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 id="myLargeModalLabel" class="modal-title">Large modal</h4>
            </div>
            <div class="modal-body"> <?php include 'timeline_contents.php'?> </div>
        </div>
    </div>
</div>

<script>
$(function(){
    $('.modal .modal-body').slimScroll({
        height: '500px'
    });
});
</script>