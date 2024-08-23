<?php
require_once 'DAO.php';
  session_start();

$action = isset($_REQUEST["action"])? $_REQUEST["action"] : ""; //provera da li je setovana akcija


if ($_SERVER['REQUEST_METHOD']="POST"){
    //akcije za unos i izmenu
    if ($action == 'update') {
       $user = isset($_POST["user"])? test_input($_POST["user"]) : ""; 
       $pass = isset($_POST["pass"])? test_input($_POST["pass"]) : ""; 
       if (!empty($user) && !empty($pass)) {
        $dao=new DAO();
        $postoji=$dao->userPostoji($user);
        if($postoji==true){
            $dao->updatePass($pass,$user);
            $klijent=$dao->getKlijentbyUsername($user);
            $_SESSION['klijent']=$klijent;
            include 'prikaz.php';
        }else {
        $msg="Klijent ne postoji";
        include 'index.php';
        }
        }else{
            $msg="Popunite sva polja";
        include 'index.php';
       }
    } elseif ($action == 'akcijaPost2') {
        // $podatak = isset($_POST["podatak"])? test_input($_POST["podatak"]) : ""; //provera da li su setovani podaci
        //...
    } 
    
} if ($_SERVER['REQUEST_METHOD']="GET"){
    //akcije za prikaz i brisanje
    if ($action == 'logout') {
            session_unset();
            session_destroy();
            include 'index.php';
    } elseif ($action == 'akcijaGet2'){
        //...
    }elseif ($action == 'akcijaGet3'){
        //...
    }
    
} else {
    //...
    header("Location: index.php"); //opciono
    die();
}

//funkcija za preradu unetih podataka
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>