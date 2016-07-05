<?php
if($message->GetMessagesCount() < 1)
{
    echo "<span class='icon-quote-right'>هنوز پیامی ارسال نشده است.</span> ";
}
else {?>
<table class="table table-hover personal-task" width="100%">
    <tr>
        <td><i class="icon-sort-by-order-alt"></i></td>
        <td>پیام</td>
        <td class="hidden-phone">ارسال کننده</td>
        <td><span class="badge bg-important">زمان</span></td>
        <?php foreach ($message_5_r as $row) { ?>
    </tr>
    <tr>
        <td width="10%"><?php echo $row['id'];?></td>
        <td width="30%" class="hidden-phone">
            <a href="messages.php?id=<?php echo $row['msg_id'];?>" target="_blank"><?php echo  substr($row['msg_body'], 0, 50); ?></a>
        </td>
        <td width="20%"><a href="users.php?id=<?php echo $row['user_id'];?>" target="_blank"><?php if($row['username'] == null) echo $row['user_id']; else echo $row['username'];?></a> </td>
        <td width="30%">
            <span class="badge bg-important"><?php echo date('m/d/Y', $row['regdate']); ?></span>
        </td>
    </tr>
    <?php }?>
</table>
<?php } ?>