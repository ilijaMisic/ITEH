<?php
    include 'header.php';

    if(!isset($_SESSION['user_id'])){
        header('Location: indeks.php');
        exit();
    }

?>

<div class="text-center">
    <h1 class="display-4"> Be Smart come to Smart!</h1>
 
    <img src="img/zapocetnu.jpg" alt="pocetna" class="img-responsive" width="1300" height="280" style="vertical-align:middle;margin:120px 0px"/>

</div>

<?php
    include 'footer.php';
?>