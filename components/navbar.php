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
                <li id=forum_Button><a href="forum.php">Forum</a></li>
                <li><a onclick="show_timeline();" href="#">Timeline</a></li>
                <li><a  href="road.php">Roads</a></li>
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

                <li id="sign-up-btn"><a href="#">Sign-up</a></li>
                <li class="dropdown">
                    <a id="Log_Button" href="#" class="dropdown-toggle" role="button" aria-expanded="false"><img src="_/img/man.png" alt="Log In" height="30" width="30"></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a id="edit-pr-btn" href="#">Edit Profile</a></li>
                        <li><a id="change-password-btn" href="#">Change Password</a></li>
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
//den ilopoiithike o elegxos ean kanei search defteri fora me ta idia dedomena
        var searchForm = document.getElementById("search_form");
        var options = ["", "", "", "", ""];

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
                success: function (data){

                    allData=JSON.parse(data);

                    var results = [];
                    var applyFilterFirst=0;   //If the value of this var is greater than 0, then the filter is applied first
                    var dateSearch=false; // This checks if the slider has been used
                    var filterFlag=false;

                    function filter(){
                        jQuery.each(allData, function(key,value) {
                            for (var i = 0; i < results.length; i++) {
                                var lng=results[i].position.D.toFixed(6);
                                var str1=value.type;
                                if(results[i].position.k==value.lat && lng==value.lng){
                                    for (var j=0; j<options.length; j++){
                                        if(str1.localeCompare(options[j])==0){
                                            results[i].setVisible(true);
                                        }
                                    }
                                }
                            }
                        });
                    }

                    function filterWithDate(){
                        var selectedDate=SL.slider('getValue');
                        jQuery.each(allData, function(key,value) {
                            var queryDate=value.date;
                            var year=queryDate.split("-", 1);

                            for (var i=0; i < results.length; i++){
                                var lng = results[i].position.D.toFixed(6);

                                var str1=value.type;

                                if ((results[i].position.k == value.lat) && (lng == value.lng) && (year>=selectedDate[0]) && (year<=selectedDate[1])) {
                                    for (var j=0; j<options.length; j++){
                                        if(str1.localeCompare(options[j])==0){
                                            results[i].setVisible(true);
                                        }
                                    }
                                }
                            }

                        });
                    }

                    //Check whether the user has pressed search without entering text
                    if (allData.length != 0) {

                        removeAllMarkers();
                        jQuery.each(allData, function (key, value) {
                            for (var i = 0; i < allMarkers.length; i++) {

                                var lng = allMarkers[i].position.D.toFixed(6);

                                if (allMarkers[i].position.k == value.lat && lng == value.lng) {
                                    allMarkers[i].setVisible(true);
                                    results.push(allMarkers[i]);
                                }
                            }
                        });

                        if ($("#legend").length == 0){
                            addLegend();
                            }

                        $("#legend").click(function (e){
                            removeAllMarkers();
                            if (applyFilterFirst==0){
                                emptyBoxes();
                                applyFilterFirst++;
                            }
                            switch (e.target.id) {
                                case "filter_memo":
                                    if(!options[0]){
                                        $("div.color.red").css("background", "rgba(240, 91, 71, 1)");
                                        options[0]="memoir";
                                    }
                                    else{
                                        $("div.color.red").css("background", "rgba(240, 91, 71, 0)");
                                        options[0]="";
                                    }
                                    break;
                                case "filter_photo":
                                    if(!options[1]){
                                        $("div.color.yellow").css("background", "rgba(253, 230, 92, 1)");
                                        options[1]="photo";
                                    }
                                    else{
                                        $("div.color.yellow").css("background", "rgba(253, 230, 92, 0)");
                                        options[1]="";
                                    }
                                    break;
                                case "filter_article":
                                    if(!options[2]){
                                        $("div.color.green").css("background", "rgba(31, 218, 154, 1)");
                                        options[2]="article";
                                    }
                                    else{
                                        $("div.color.green").css("background", "rgba(31, 218, 154, 0)");
                                        options[2]="";
                                    }


                                    break;
                                case "filter_property":

                                    if(!options[3]){
                                        $("div.color.blue").css("background", "rgba(40, 171, 227, 1)");
                                        options[3]="property";
                                    }
                                    else{
                                        $("div.color.blue").css("background", "rgba(40, 171, 227, 0)");
                                        options[3]="";
                                    }


                                    break;
                                case "filter_date":
                                    console.log("date");

                                    if($("#alignRight").css("display")== 'none') {
                                        $("div.color.grey").css("background", "rgba(127, 127, 127, 1)");
                                        $("#alignRight").show();
                                        filterFlag=true;
                                    }
                                    else {
                                        $("div.color.grey").css("background", "rgba(127, 127, 127, 0)");
                                        $("#alignRight").hide();
                                        dateSearch=false;
                                        filterFlag=false;
                                    }


                                    break;
                                case "boxclose":
                                    displayAllMarkers();
                                    $("#search_text").val("");
                                    $("#legend").remove();
                                    $("#alignRight").hide();
                                    applyFilterFirst=0;
                                    options = ["", "", "", ""];
                                    break;
                                default:
                                    options = ["memoir", "photo", "article", "property"];
                                    colorBoxes();
                                    if (dateSearch){
                                        applyFilterFirst=0;
                                    }

                            }

                            if (filterFlag==false){
                                filter();
                            }
                            else if (filterFlag) {

                                //This must be executed only the first time when the Date option is selected.

                                if (!dateSearch){
                                    if (applyFilterFirst==0){
//                                        var optionsAlt = ["memoir", "photo", "article", "property"];
                                        $("div.color.red").css("background", "rgba(240, 91, 71, 1)");
                                        $("div.color.yellow").css("background", "rgba(253, 230, 92, 1)");
                                        $("div.color.green").css("background", "rgba(31, 218, 154, 1)");
                                        $("div.color.blue").css("background", "rgba(40, 171, 227, 1)");
                                    }


                                    //filterWithDate();
                                }

                                filterWithDate();

                                $("#ex2").on("change", function(slideEvt) {
                                    dateSearch=true;
                                    removeAllMarkers();
                                    filterWithDate();


                                });
                            }
                            else{
                                displayAllMarkers();
                                $("#search_text").val("");
                                $("#legend").remove();
                            }

                        });

                    }
                }

            });
            //Prevent the default reaction on form's submit
            p.preventDefault();
        });

    });


</script>