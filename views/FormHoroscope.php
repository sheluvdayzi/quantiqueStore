<?php
include('header.php');
?>

<main>
    <form action="../function/fonctionsHoroscope.php" method="post">
        <div class="labelInputContain">
            <label for="name">Entre ton prénom</label>
            <input type="text" name="name" id="name" required/>
        </div>
        <div class="labelInputContain">
            <label for="lastName">Entre ton nom</label>
            <input type="text" name="lastName" id="lastName" required/>
        </div>
        <div class="labelInputContain">
            <label for="birthday">Entre ta date de naissance</label>
            <input type="date" name="birthday" id="birthday" required/>
        </div>
        <input type="submit" id="subButton" name="submitHoroscope">
    </form>
</main>