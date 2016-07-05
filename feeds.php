<?php require('inc/functions.php'); $set = new Settings(); $set->IsValidUser();
$feed = new Feeds();
$result = $feed->feed();

?>
<!DOCTYPE html>
<html lang="fa">
<?php require("inc/head.php"); ?>
<?php if(!isset($_GET['edit']) && !isset($_GET['add']))
{
    ?>
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#results" ).load( "inc/page_config_feeds_fetching.php"); //load initial records

            //executes code below when user click on pagination links
            $("#results").on( "click", ".pagination a", function (e){
                e.preventDefault();
                $(".loading-div").show(); //show loading element
                var page = $(this).attr("data-page"); //get page number from link
                $("#results").load("inc/page_config_feeds_fetching.php",{"page":page}, function(){ //get content from PHP page
                    $(".loading-div").hide(); //once done, hide loading element
                });

            });
        });
    </script>
    <?php
}
?>
<body>
<section id="container" class="">
    <?php require("inc/header.php"); ?>
    <?php require("inc/sidebar.php"); ?>
    <?php
    if(isset($_GET['id']))
    {
        require("inc/ShowFeeds.php");
    }
    elseif(isset($_GET['edit']))
    {
        require("inc/EditFeeds.php");
    }
    elseif(isset($_GET['delete']))
    {
        require("inc/DeleteFeeds.php");
    }
    elseif(isset($_GET['add']))
    {
        require("inc/AddFeed.php");
    }
    elseif(isset($_GET['search']))
    {
        require("inc/SearchFeeds.php");
    }
    else
    {
        require("inc/ShowAllFeeds.php");
    }
    ?>
    <script src="js/jquery.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <script src="js/jquery.customSelect.min.js" ></script>

    <script src="js/common-scripts.js"></script>

    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>

    <script>

        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
                navigation : true,
                slideSpeed : 300,
                paginationSpeed : 400,
                singleItem : true

            });
        });

        $(function(){
            $('select.styled').customSelect();
        });

    </script>
</body>
</html>
