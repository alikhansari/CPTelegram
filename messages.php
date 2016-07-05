<?php
require('inc/functions.php');
$set = new Settings();
$set->IsValidUser();
$message = new Message();
$msg_r_messages = $message->GetMessages();
?>
<!DOCTYPE html>
<html lang="fa">
<?php require("inc/head.php"); ?>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#results" ).load( "inc/page_config_fetching.php"); //load initial records

        //executes code below when user click on pagination links
        $("#results").on( "click", ".pagination a", function (e){
            e.preventDefault();
            $(".loading-div").show(); //show loading element
            var page = $(this).attr("data-page"); //get page number from link
            $("#results").load("inc/page_config_fetching.php",{"page":page}, function(){ //get content from PHP page
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
        require("inc/ShowMessages.php");
    }
    elseif(isset($_GET['mass_id']))
    {
        require("inc/MassMessages.php");
    }
    elseif(isset($_GET['search']))
    {
        require("inc/SearchMessage.php");
    }
    elseif(isset($_GET['user']))
    {
        require("inc/SearchUser.php");
    }
    elseif(isset($_GET['mass']))
    {
        require("inc/ShowMassMessages.php");
    }
    else
    {
        require("inc/MainMessageMenu.php");
    }
    ?>
</section>
<?php require("inc/footer.php"); ?>
<script src="js/dynamic-table.js"></script>

</body>
</html>
