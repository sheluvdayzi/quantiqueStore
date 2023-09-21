<?php
if(isset($_POST['submitHoroscope'])){
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $birthday = $_POST['birthday'];
    
    sendHoroscope($name, $lastName, $birthday, '12', 'lion');
}


function sendHoroscope($secondName, $firstName, $birthday, $age, $horoscope) {
    $contenu = "
    <main>
        <img src='/assets/img/$horoscope.jpg' alt=''>
        <p class='nameOfUser'>$secondName $firstName</p>
        <p class='birthday'>Date de naissance : $birthday</p>
        <p class='age'>$age</p>
    </main>";

    require("../views/layout.php");
}
?>
