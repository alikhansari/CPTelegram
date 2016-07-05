                    <header class="panel-heading">تغییر نام کاربری </header>
                    <div class="panel-body">
                        <form class="form-horizontal tasi-form" action="settings.php" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">نام کاربری جدید</label>
                                <div class="col-sm-10">
								<?php
								
								?>
                                    <input type="text" required name="username" placeholder="نام کاربری را وارد کنید" value="<?php if(!isset($_POST['username'])) {$r = $set->GetUsernameAdmin(); echo $r['username'];} else echo $set->CheckParamPost("username"); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" name="CHANGE_USERNAME" class="btn btn-info">ذخیره</button>
                                </div>
                            </div>


                            <?php
                            if($result_3 != false)
                            {
                                ?>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-10">
                                        <?php echo $result_3;?>
                                    </div>
                                </div>

                                <?php
                            }
                            ?>
                        </form>
                    </div>
