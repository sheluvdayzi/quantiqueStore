<!-- Message erreur si ta pas 18ans, revenir formulaire en sauvegardant le prenom et nom mai enlever la date -->
<!-- api soit jour soit hebdomadaire  -->
<!-- Fetch -->

<?php
if (isset($_POST['submitHoroscope'])) {
   $name = $_POST['name'];
   $lastName = $_POST['lastName'];
   $birthday = $_POST['birthday'];

   sendHoroscope($name, $lastName, dateAffiche($birthday), age($birthday), astrologie_signe($birthday));
}



function sendHoroscope($name, $secondName, $birthday, $age, $horoscope)
{
   $contenu = "
   <main>
      <div id='test'> 
            <p>Prénom : $name</p>
            <p>Nom : $secondName </p>
            <p>$birthday</p>
            <p> Age : $age</p>
            <img src='/assets/img/$horoscope.jpg' alt=''>
      </div>
   </main>";

   require("../views/layout.php");
}

function dateAffiche($birthday){
   $days = array(
      'Monday' => 'Lundi',
      'Tuesday' => 'Mardi',
      'Wednesday' => 'Mercredi',
      'Thursday' => 'Jeudi',
      'Friday' => 'Vendredi',
      'Saturday' => 'Samedi',
      'Sunday' => 'Dimanche'
   );
   $mouths = array(
      'January' => 'Janvier',
      'February' => 'Février',
      'March' => 'Mars',
      'April' => 'Avril',
      'May' => 'Mai',
      'June' => 'Juin',
      'July' => 'Juillet',
      'August' => 'Août',
      'September' => 'Septembre',
      'October' => 'Octobre',
      'November' => 'Novembre',
      'December' => 'Décembre'
   );

   $birthday = explode('-', $birthday);
   return 'Nous sommes le '.$days[date('l', mktime(0, 0, 0, $birthday[1], $birthday[2], $birthday[0]))] . ' ' . $birthday[2] . ' ' . $mouths[date('F', mktime(0, 0, 0, $birthday[1], $birthday[2], $birthday[0]))] . ' ' . $birthday[0];
}  

function age($dateNaissance)
{
   $aujourdhui = date("Y-m-d");
   $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
   return $diff->format('%y');
}

function astrologie_signe($date){
   $astrologie_signe = '';

   list($annee, $mois, $jour) = explode("-", $date);

   if (($mois == 3 && $jour > 20) || ($mois == 4 && $jour < 20)) {

      $astrologie_signe = "belier";
   } elseif (($mois == 4 && $jour > 19) || ($mois == 5 && $jour < 21)) {

      $astrologie_signe = "taureau";
   } elseif (($mois == 5 && $jour > 20) || ($mois == 6 && $jour < 21)) {

      $astrologie_signe = "gemeaux";
   } elseif (($mois == 6 && $jour > 20) || ($mois == 7 && $jour < 23)) {

      $astrologie_signe = "cancer";
   } elseif (($mois == 7 && $jour > 22) || ($mois == 8 && $jour < 23)) {

      $astrologie_signe = "lion";
   } elseif (($mois == 8 && $jour > 22) || ($mois == 9 && $jour < 23)) {

      $astrologie_signe = "vierge";
   } elseif (($mois == 9 && $jour > 22) || ($mois == 10 && $jour < 23)) {

      $astrologie_signe = "balance";
   } elseif (($mois == 10 && $jour > 22) || ($mois == 11 && $jour < 22)) {

      $astrologie_signe = "scorpion";
   } elseif (($mois == 11 && $jour > 21) || ($mois == 12 && $jour < 22)) {

      $astrologie_signe = "sagittaire";
   } elseif (($mois == 12 && $jour > 21) || ($mois == 1 && $jour < 20)) {

      $astrologie_signe = "capricorne";
   } elseif (($mois == 1 && $jour > 19) || ($mois == 2 && $jour < 19)) {

      $astrologie_signe = "verseau";
   } elseif (($mois == 2 && $jour > 18) || ($mois == 3 && $jour < 21)) {

      $astrologie_signe = "poisson";
   }

   return $astrologie_signe;
}
