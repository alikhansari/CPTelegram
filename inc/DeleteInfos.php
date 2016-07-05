<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <?php
                    if($result != false)
                    {
                        ?>
                        <header class="panel-heading">حذف دستور</header>
                        <div class="panel-body">
                            <form class="form-horizontal tasi-form" action="infos.php?delete=<?php echo $_GET['delete'];?>" method="POST">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <?php
                                        if($result != "با موفقیت حذف شد") {
                                            ?>
                                            آیا واقعا می خواهید دستور "<?php echo $result['key_array']; ?> " حذف شود ؟
                                            <button type="submit" name="DELETE" class="btn-danger">حذف شود</button>

                                            <?php
                                        }
                                        else{
                                            echo $result;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                    } elseif($result == false) {
                        ?>
                        <div class="alert alert-block alert-danger fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="icon-remove"></i>
                            </button>
                            <strong>اوه! </strong> دستور درخواستی، یافت نشد.
                            <a href="buttons.php">صفحه اصلی</a>
                        </div>

                        <?php
                    }
                    ?>
                </section>
            </div>
        </div>
    </section>
</section>
