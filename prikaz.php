<?php 
require_once 'DAO.php';
if(!isset($_SESSION)) session_start();
if ($_SESSION['klijent']!="") {
    $dao=new DAO();
$klijent1=$_SESSION['klijent'];
?>
<?php include './partials/header.php'; ?>
<div class="row" style="margin-left:1rem ;">
<div class="col-12">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Password</th>
        </tr>
        <?php foreach ($klijent1 as $pom){ ?>
        <tr>
        <td><?=$pom["id"] ?></td>
        <td><?=$pom["user"] ?></td>
        <td><?=$pom["pass"] ?></td>
        </tr>
        <?php } ?>
    </table>
    <a href="controller.php?action=logout">LOGOUT</a>
    <a href="./index.php">Index</a>
    </div>

</div>
<?php include './partials/footer.php' ?>
<?php }else{
    header('Location:index.php');
}
 ?>