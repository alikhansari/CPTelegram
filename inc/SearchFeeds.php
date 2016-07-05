<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">جستجوی فید ها</header>
                    <div class="panel-body">
                        <form class="form-horizontal tasi-form" action="feeds.php?search" method="POST">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <select name="TYPE" class="">
                                        <option value="1"
                                            <?php
                                            if(isset($_POST['TYPE']))
                                            {
                                                if($_POST['TYPE'] == 1)
                                                {
                                                    echo "selected";
                                                }
                                            }
                                            ?>>
جستجو بر اساس کد فید                                        </option>
                                        <option value="2"
                                            <?php
                                            if(isset($_POST['TYPE']))
                                            {
                                                if($_POST['TYPE'] == 2)
                                                {
                                                    echo "selected";
                                                }
                                            }
                                            ?>
                                            >جستجو بر اساس آدرس</option>

                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" required name="value" placeholder="مقدار مورد نظر" value="<?php if($set->CheckParamPost("value") == null) echo $result['value']; else echo $set->CheckParamPost("value"); ?>" class="form-control">
                                </div>
                            </div>
                            <button type="submit" name="SEARCH" class="btn btn-info">جستجو</button>
                    </div>
                    </form>
                    <?php
                    if($result == "چیزی یافت نشد.")
                    {
                        ?>
                        <div style="text-align: center;">متأسفانه چیزی یافت نشد.</div>
                        <?php
                    } elseif($result != false) {
                        ?>
                        <table class="table table-striped border-top" id="sample_1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th class="hidden-phone">آدرس </th>
                                <th class="">تعداد</th>
                                <th class="">ویرایش</th>
                                <th class="">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($result as $row) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $row['id'];?></td>
                                    <td class="hidden-phone"><a href="feeds.php?id=<?php echo $row['id'];?>" target="_blank"><?php echo substr($row['url'],7,100)?></a> </td>
                                    <td class=""><span class="label label-success"><?php echo $row['cnt'];?></span></td>
                                    <td class=""><a href="feeds.php?edit=<?php echo $row['id'];?>" target="_blank"><i class="icon-edit"></i></a> </td>
                                    <td class=""><a href="feeds.php?delete=<?php echo $row['id'];?>" target="_blank"><i class="icon-remove-circle"></i></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php
                    }
                    ?>
            </div>
    </section>
    </div>
    </div>
</section>
</section>