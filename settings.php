<?php require('inc/functions.php'); $set = new Settings(); $set->IsValidUser();
$set = new Settings();
$result_1 = $set->Change_Start_Message();
$result_2 = $set->Change_Cols();
$result_3 = $set->ChangeUsername();
$result_4 = $set->ChangePassword();
?>
<!DOCTYPE html>
<html lang="fa">
<?php require("inc/head.php"); ?>
<body>
<section id="container" class="">
    <?php require("inc/header.php"); ?>
    <?php require("inc/sidebar.php"); ?>
                    <?php require("inc/StartMessageForm.php"); ?>
                    <?php require("inc/ChangeColsForm.php"); ?>
                    <?php require("inc/ChangeUsernameForm.php"); ?>
                    <?php require("inc/ChangePasswordForm.php"); ?>

        </section>
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
