<?php include('partials/meniu.php'); ?>

        <!-- Main Content Section Starts --> 
        <div class="main-content">
           <div class="wrapper">
            <h1>Informatii generale</h1>
            <br /> <br /> <br />

             <div class="col-4 text-center">
               <h1>3</h1>
                 Competitii trecute
             </div>

             <div class="col-4 text-center">
               <h1>4</h1>
                 Probe specifice
             </div>

             <div class="col-4 text-center">
               <h1>6</h1>
                 Competitii viitoare
             </div>

             <div class="col-4 text-center">
               <h1>10</h1>
                 Sponsori noi
             </div>

             <div class="clearfix"></div>

           </div>
         </div>
        <!-- Main Content Section Ends -->


<div class="main-content"> 
    <div class="wrapper">
       <h1>I. Evidenta probelor</h1>


        <br /> <br /> <br />
<!-- prima interogare complexa -->

<?php

$query = "SELECT P.Denumire_p, (SELECT COUNT(*) FROM Atleti A
          WHERE A.ProbaID = P.ProbaID) AS NrAtleti
          FROM Probe P
          GROUP BY P.Denumire_p, NrAtleti"; 
$result = mysqli_query($connection, $query); //res
$count = mysqli_num_rows($result);
$atleti = [];
while($row = $result->fetch_assoc()) {
    $atleti[] = $row;
}

?>

    <table class="tbl-full", border = "3">
    <!-- <table border="1"> -->
      <tr>
        <th>Proba</th>
        <th>Numar atleti</th>
       <!-- <th>Actiuni</th> -->
     </tr>

<?php foreach ($atleti as $atlet):?>
    
        <td><?php echo $atlet['Denumire_p']; ?></td>
        <td><?php echo $atlet['NrAtleti']; ?></td>
</tr>
<?php endforeach; ?>

</table>



</div>
</div>

<!-- a doua interogare complexa -->

<div class="main-content"> 
    <div class="wrapper">
       <h1>II. Ordonarea atletilor dupa data nasterii</h1>


        <br /> <br /> <br />

<?php

$query = "SELECT Nume, Prenume, Data_nasterii 
          FROM Atleti
          WHERE Data_nasterii < (SELECT Data_nasterii FROM Atleti WHERE AtletID = 1)
          GROUP BY Nume, Prenume, Data_nasterii
          ORDER BY Data_nasterii DESC"; 
$result = mysqli_query($connection, $query); //res
$count = mysqli_num_rows($result);
$atleti = [];
while($row = $result->fetch_assoc()) {
    $atleti[] = $row;
}

?>

    <table class="tbl-full", border = "3", color = "green">
    <!-- <table border="1"> -->
      <tr>
        <th>Nume</th>
        <th>Prenume</th>
        <th>Data nasterii</th>
       <!-- <th>Actiuni</th> -->
     </tr>

<?php foreach ($atleti as $atlet):?>
    
        <td><?php echo $atlet['Nume']; ?></td>
        <td><?php echo $atlet['Prenume']; ?></td>
        <td><?php echo $atlet['Data_nasterii']; ?></td>

</tr>
<?php endforeach; ?>

</table>


</div>
</div>

<div class="main-content"> 
    <div class="wrapper">
       <h1>III. Sponsori necontactati</h1>


        <br /> <br /> <br />

<!-- a treia interogare complexa -->

<?php

$query = "SELECT S.Denumire, S.Email
          FROM Sponsori_principali S
          WHERE S.SponsorID NOT IN (SELECT A.SponsorID FROM Atleti A)
          ORDER BY S.Denumire ASC"; 
$result = mysqli_query($connection, $query); //res
$count = mysqli_num_rows($result);
$atleti = [];
while($row = $result->fetch_assoc()) {
    $atleti[] = $row;
}

?>

    <table class="tbl-full", border = "3">
    <!-- <table border="1"> -->
      <tr>
        <th>Denumire sponsor</th>
        <th>Email</th>

       <!-- <th>Actiuni</th> -->
     </tr>

<?php foreach ($atleti as $atlet):?>
    
        <td><?php echo $atlet['Denumire']; ?></td>
        <td><?php echo $atlet['Email']; ?></td>

</tr>
<?php endforeach; ?>

</table>




</div>
</div>


<div class="main-content"> 
    <div class="wrapper">
       <h1>IV. Clasamentul atletilor dupa numar competitii</h1>


        <br /> <br /> <br />
<!-- a patra interogare complexa -->


<?php

$query = "SELECT A.Nume, A.Prenume
          FROM Atleti A
          ORDER BY (SELECT CF.Nr_competitii_frecventate FROM Competitii_frecventate CF
		      WHERE A.AtletID = CF.AtletID) DESC;"; 
$result = mysqli_query($connection, $query); //res
$count = mysqli_num_rows($result);
$atleti = [];
while($row = $result->fetch_assoc()) {
    $atleti[] = $row;
}

?>

    <table class="tbl-full", border = "3">
    <!-- <table border="1"> -->
      <tr>
        <th>Nume</th>
        <th>Prenume</th>

       <!-- <th>Actiuni</th> -->
     </tr>

<?php foreach ($atleti as $atlet):?>
    
        <td><?php echo $atlet['Nume']; ?></td>
        <td><?php echo $atlet['Prenume']; ?></td>
</tr>
<?php endforeach; ?>

</table>


<br /> <br /> <br />
<br /> <br /> <br />
</div>
</div>



<?php include('partials/footer.php') ?>