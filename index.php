<?php 
$msg=isset($msg)?($msg):"";
include 'partials/header.php';
?>
<div class="container">
    <form action="controller.php" method="POST">
       User: <br> <input type="text" name="user"><br>
       Password: <br> <input type="text" name="pass"><br><br>
       <input type="submit" name="action" value="update">
    </form>
    <?=$msg  ?>
</div>
<?php 
include 'partials/footer.php';
?>