<div id="login-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Log in</h4>

            </div>
            <form method="post" name="login-form" action="members/login/checklogin.php" class="form-horizontal">
                <fieldset>
                    <div class="modal-body">
                        <br>
                        <div class="facebook" class="row">
                            <a href="#"><img id="fb_colored" src="_/img/fb-login.png" alt="Facebook" onclick="myLogin();" scope="public_profile, email"></a>
                        </div>

                        <br>
                        <br>

                        <div class="facebook" class="row">
                            <a href="#"><img id="fb_colored" src="_/img/new_line.png" alt="line"></a>
                        </div>

                        <br>
                        <br>

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


<!--<div id="login-modal" class="modal fade">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
<!--                <h3 class="modal-title">Log In</h3>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--<!--                <div class="row">-->
<!--                    <center>-->
<!--                        <div class="col-md-4 col-xs-6">-->
<!--                            <a href="#"><img id="fb_colored" src="assets/imgs/facebook_colored.png" alt="Facebook" height="64" width="64"></a>-->
<!--                        </div>-->
<!--                        <div class="col-md-4 col-xs-6">-->
<!--                            <a href="#"><img id="g+_colored" src="assets/imgs/google_colored.png" alt="Google+" height="64" width="64"></a>-->
<!--                        </div>-->
<!--                        <div class="col-md-4 col-xs-6">-->
<!--                            <a href="#"><img id="t_colored" src="assets/imgs/twitter_colored.png" alt="Twitter" height="64" width="64"></a>-->
<!--                        </div>-->
<!--                    </center>-->
<!--                </div>-->
<!--                <br>-->
<!--                <br>-->
<!--                <div class="row">-->
<!--                    <center>-->
<!--                        <a href="#"><img id="line" src="assets/imgs/line.png" alt="Line" height="32"></a>-->
<!--                    </center>-->
<!--                </div>-->
<!--                <br>-->
<!--                <div class="row">-->
<!--                    <center>-->
<!--                        <p>Don't you have an account? Create one-->
<!--                            <a href="#" id="signup" data-dismiss="modal" alt="Sign Up">-->
<!--                                here.-->
<!--                            </a>-->
<!--                        </p>-->
<!--                    </center>-->
<!--                </div>-->
<!--                <br>-->
<!--                <div class="input-group" id="usr">-->
<!--                    <span class="input-group-addon">Email:</span>-->
<!--                    <input type="text" class="form-control" placeholder="">-->
<!--                </div>-->
<!--                <br>-->
<!--                <div class="input-group" id="pwd">-->
<!--                    <span class="input-group-addon">Password:</span>-->
<!--                    <input type="text" class="form-control" placeholder="">-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
<!--                <button type="button" class="btn btn-primary">Log In</button>-->
<!--            </div>-->
<!--        </div><!-- /.modal-content -->
<!--    </div><!-- /.modal-dialog -->
<!--</div><!-- /.modal -->