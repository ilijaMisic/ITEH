<?php
    include "header.php";

    if(!isset($_SESSION['user_id'])){
        header('Location: indeks.php');
        exit();
    }
?>
<?php
    include "footer.php";
?>