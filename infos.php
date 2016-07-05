<?php require('inc/functions.php'); $set = new Settings(); $set->IsValidUser();
$infos = new Infos();
$result = $infos->inf();
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
            $("#results" ).load( "inc/page_config_infos_fetching.php"); //load initial records

            //executes code below when user click on pagination links
            $("#results").on( "click", ".pagination a", function (e){
                e.preventDefault();
                $(".loading-div").show(); //show loading element
                var page = $(this).attr("data-page"); //get page number from link
                $("#results").load("inc/page_config_infos_fetching.php",{"page":page}, function(){ //get content from PHP page
                    $(".loading-div").hide(); //once done, hide loading element
                });

            });
        });
    </script>
    <?php
}
?>
<script type="text/javascript">
    function countChars()
    {
        var theForm = document.form_edit,
            allValues = theForm.msg.value,
            allValuesNoSpaces = allValues.replace();
        document.form_edit.count_display.value = allValuesNoSpaces.length;
    }
</script>

<body>
<section id="container" class="">
    <?php require("inc/header.php"); ?>
    <?php require("inc/sidebar.php"); ?>
    <?php
    if(isset($_GET['id']))
    {
        require("inc/ShowInfos.php");
    }
    elseif(isset($_GET['edit']))
    {
        require("inc/EditInfos.php");
    }
    elseif(isset($_GET['delete']))
    {
        require("inc/DeleteInfos.php");
    }
    elseif(isset($_GET['add']))
    {
        require("inc/AddInfo.php");
    }
    elseif(isset($_GET['search']))
    {
        require("inc/SearchInfos.php");
    }
    else
    {
        require("inc/ShowAllInfos.php");
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
