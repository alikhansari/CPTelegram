<?php require('inc/functions.php'); $set = new Settings(); $set->IsValidUser();
$user = new  Users();
$result = $user->SearchUser();
?>
<!DOCTYPE html>
<html lang="fa">
<?php require("inc/head.php"); ?>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#results" ).load( "inc/page_config_user_fetching.php"); //load initial records

        //executes code below when user click on pagination links
        $("#results").on( "click", ".pagination a", function (e){
            e.preventDefault();
            $(".loading-div").show(); //show loading element
            var page = $(this).attr("data-page"); //get page number from link
            $("#results").load("inc/page_config_user_fetching.php",{"page":page}, function(){ //get content from PHP page
                $(".loading-div").hide(); //once done, hide loading element
            });

        });
    });
</script>
<body>
<section id="container" class="">
    <?php require("inc/header.php"); ?>
    <?php require("inc/sidebar.php"); ?>
            <?php
            if(isset($_GET['id']))
            {
                require("inc/ShowUser.php");
            }
            else
            {
                require("inc/ShowAllUsers.php");
            }
    ?>
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/jquery.sparkline.js" type="text/javascript"></script>
<script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="js/owl.carousel.js" ></script>
<script src="js/jquery.customSelect.min.js" ></script>

<!--common script for all pages-->
<script src="js/common-scripts.js"></script>

<!--script for this page-->
<script src="js/sparkline-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>

<script>

    //owl carousel

    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true

        });
    });

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

</script>

</body>
</html>
