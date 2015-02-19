<nav id="top_menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Demographics</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- to class active dilwnei oti einai mavrismeno xwris na perasei to mouse apo panw -->
        <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li> -->
        <li id=forum_Button><a href="community/vanilla/index.php">Forum</a></li>

        <li class="dropdown">
          <a href="#" id="notification-dropdown" role="button" aria-expanded="false">Notifications<span id="notification-badge" class="badge-info badge"></span></a>
          <ul id="notification-list" class="dropdown-menu" role="menu">
          </ul>
        </li>
          
      </ul>
       <form id="search_form" name='searcher' action="search.php" method="post" class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input id="search_text" type="text" class="form-control" placeholder="Search">
        </div>
        <button id="submit_button" type="submit" class="btn btn-default"><i class="fa fa-search"></i>
</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a id="LogIn_Button" href="#">Log In</a></li> -->
        <!-- <li><a id="LogOut_Button" href="#">Log Out</a></li> -->
          <!-- <span class="caret"></span> -->
       
        <li id="sign-up-btn"><a href="#">Sign-up</a></li>  
        <li class="dropdown">
          <a id="Log_Button" href="#" class="dropdown-toggle" role="button" aria-expanded="false"><img src="_/img/man.png" alt="Log In" height="30" width="30"></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Edit Profile</a></li>
            <li><a href="#">Something else</a></li>
            <li class="divider"></li>
            <li><a id="LogOut_Button" href="#">Log Out</a></li>
          </ul>
        </li>
          
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<script>
    $(document).ready(function(){
        
        var searchForm = document.getElementById("search_form"); 
            
            $("form[name='searcher']").submit(function(p) {
            
            var search_word= $("#search_text").val();
            var allData=null;
            //Send data to upload.php using ajax
            $.ajax({
                url: "search.php",
                type: "POST",
                data: {
                    search_text: search_word
                },
                async: false,
                //If ajax is successful, execute the followings
                success: function (data) {
                    //console.log(data);
                    
                    allData=JSON.parse(data);
                    jQuery.each(allData, function(key,value) {
                        console.log(value.id);
                        });
                    
                    
                    for (var i = 0; i < allMarkers.length; i++) {
                        allMarkers[i].setVisible(false); 
                        }                        

                },
            });
            //Prevent the default reaction on form's submit
            p.preventDefault();
        });
    
    
    });
        
        
</script>