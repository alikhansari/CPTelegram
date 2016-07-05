<hr>
                    <header class="panel-heading">تغییر تعداد ستون های فرعی و اصلی</header>
                    <div class="panel-body">
                    <form class="form-horizontal tasi-form" action="settings.php" method="POST">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">تعداد ستون های اصلی:</label>
                            <div class="col-sm-10">
                            <select name="main">
                                    <?php for($i=1;$i<=5;$i++)
                                    {
                                        ?>
                                        <option value="<?php echo $i;?>"
                                            <?php if(isset($_POST['main']))
                                            {
                                                if($_POST['main'] == $i)
                                                {
                                                echo "selected";
                                                }
                                            }
                                            elseif($i == $set->FetchCols(1))
                                            {
                                            echo "selected";
                                            }
                                            ?>>
                                            <?php echo $i;?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">تعداد ستون های فرعی:</label>
                            <div class="col-sm-10">
                            <select name="sub">
                                <?php for($i=1;$i<=5;$i++)
                                {
                                    ?>
                                    <option value="<?php echo $i;?>"
                                        <?php if(isset($_POST['sub']))
                                        {
                                            if($_POST['sub'] == $i)
                                            {
                                                echo "selected";
                                            }
                                        }
                                        elseif($i == $set->FetchCols(2))
                                        {
                                            echo "selected";
                                        }
                                        ?>>
                                        <?php echo $i;?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="CHANGE_COLS" class="btn btn-info">ذخیره</button>
                            </div>
                        </div>


                        <?php
                        if($result_2 != false)
                        {
                            ?>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <?php echo $result_2;?>
                                </div>
                            </div>

                            <?php
                        }
                        ?>
                    </form>
                        </div>
