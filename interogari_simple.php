<?php include('partials/meniu.php'); ?>

<div class="main-content"> 
    <div class="wrapper">
       <h1>Relatii Atleti - Antrenori</h1>

       <br />

<!--Button to Add Atlet -->
<a href="insert_atleti.php" class="btn-primary">Adauga Atlet</a>

<br /> <br /> <br />

<?php

$query = "SELECT A.AtletID, AN.AntrenorID, A.Nume, A.Prenume, COUNT(A.AtletID) AS NrAntrenori
          FROM Atleti A INNER JOIN Antrenori AN ON A.AtletID = AN.AtletID
          GROUP BY A.Nume, A.Prenume"; 
$result = mysqli_query($connection, $query); //res
$count = mysqli_num_rows($result);
$atleti = [];
while($row = $result->fetch_assoc()) {
    $atleti[] = $row;
}

?>

    <table class="tbl-full", border = "1">
    <!-- <table border="1"> -->
      <tr>
        <th>Nume</th>
        <th>Prenume</th>
        <th>Numar antrenori</th>
        <th>Actiuni</th>
       <!-- <th>Actiuni</th> -->
     </tr>

<?php foreach ($atleti as $atlet):?>
    <tr data-id="<?php echo $atlet['AtletID']; ?>">
        <td><?php echo $atlet['Nume']; ?></td>
        <td><?php echo $atlet['Prenume']; ?></td>
        <td><?php echo $atlet['NrAntrenori']; ?></td>
    <td>
    <a href="<?php echo 'http://localhost/sport/'; ?>admin/update_atleti.php?id=<?php echo $atlet['AtletID']; ?>" class="btn-secondary">Update Atlet</a>
   
    <a href="<?php echo 'http://localhost/sport/'; ?>admin/delete_atleti.php?id=<?php echo $atlet['AtletID']; ?>" class="btn-danger">Delete Atlet</a>
</td>
</tr>
<?php endforeach; ?>

</table>

 
</div>

</div>
<!-- de aici am adaugat tabel interogare simpla 6-->

<div class="main-content"> 
    <div class="wrapper">
       <h1>Relatii Atleti - Sponsori</h1>

       <br />

<?php

$query = "SELECT A.AtletID, A.Nume, A.Prenume, A.Club_sportiv, S.An_colaborare
          FROM Atleti A INNER JOIN Sponsori_principali S ON (A.SponsorID = S.SponsorID)
          WHERE S.An_colaborare > '2014-01-01'
          GROUP BY A.Nume, A.Prenume, A.Club_sportiv, S.An_colaborare"; 
$result = mysqli_query($connection, $query); //res
$count = mysqli_num_rows($result);
$atleti = [];
while($row = $result->fetch_assoc()) {
    $atleti[] = $row;
}

?>

    <table class="tbl-full", border = "1">
    <!-- <table border="1"> -->
      <tr>
        <th>Nume</th>
        <th>Prenume</th>
        <th>Club sportiv</th>
        <th>An colaborare cu sponsor</th>
        <th>Actiuni</th>
       <!-- <th>Actiuni</th> -->
     </tr>

<?php foreach ($atleti as $atlet):?>
    <tr data-id="<?php echo $atlet['AtletID']; ?>">
        <td><?php echo $atlet['Nume']; ?></td>
        <td><?php echo $atlet['Prenume']; ?></td>
        <td><?php echo $atlet['Club_sportiv']; ?></td>
        <td><?php echo $atlet['An_colaborare']; ?></td>
    <td>
    <a href="<?php echo 'http://localhost/sport/'; ?>admin/index.php?id=<?php echo $atlet['AtletID']; ?>" class="btn-secondary">Update</a>
   
    <a href="<?php echo 'http://localhost/sport/'; ?>admin/meniu.php?id=<?php echo $atlet['AtletID']; ?>" class="btn-danger">Delete</a>
</td>
</tr>
<?php endforeach; ?>

</table>

<br /> <br /> <br />
<br /> <br /> <br />


</div>

</div>

<?php include('partials/footer.php'); ?> 

