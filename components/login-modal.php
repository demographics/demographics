<div id="login-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Log in</h4>
            </div>
            <form method="post" action="members/login/checklogin.php" class="form-horizontal">
                <fieldset>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="email-input">Email:</label>  
                            <div class="col-md-4">
                                <input id="email-input" name="email-input" placeholder="Email address" class="form-control input-md" required="" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="password-input">Password:</label>
                            <div class="col-md-4">
                                <input id="password-input" name="password-input" placeholder="Password" class="form-control input-md" required="" type="password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="login-btn"></label>
                            <div class="col-md-8">
                                <button id="login-btn" name="login-btn"  class="btn btn-primary">Log in</button>
                                <button id="cancel-btn" name="cancel-btn" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            </div>
                        </div>   
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>