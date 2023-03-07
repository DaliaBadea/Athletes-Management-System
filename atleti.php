<?php include('partials/meniu.php'); ?>

<div class="main-content"> 
    <div class="wrapper">
       <h1>Date Atleti</h1>

       <br />

<!--Button to Add Atlet -->
<a href="insert_atleti.php" class="btn-primary">Adauga Atlet</a>

<br /> <br /> <br />

<?php

$query = "SELECT A.AtletID, A.Nume, A.Prenume, A.CNP, A.Data_nasterii, A.Email, A.Telefon, A.Strada, A.Numar, A.Oras, A.Judet, A.Club_sportiv, A.Sex, S.Denumire 
          FROM Atleti A JOIN Sponsori_principali S ON A.SponsorID = S.SponsorID"; 
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
        <th>Denumire sponsor</th>
        <th>Nume</th>
        <th>Prenume</th>
        <th>CNP</th>
        <th>Data nasterii</th>
        <th>Email</th>
        <th>Telefon</th>
        <th>Strada</th>
        <th>Numar</th>
        <th>Oras</th>
        <th>Judet</th>
        <th>Club sportiv</th>
        <th>Sex</th>
        <th>Actiuni</th>
     </tr>

<?php foreach ($atleti as $atlet):?>
    <tr data-id="<?php echo $atlet['AtletID']; ?>">
        <td><?php echo $atlet['Denumire']; ?></td>
        <td><?php echo $atlet['Nume']; ?></td>
        <td><?php echo $atlet['Prenume']; ?></td>
        <td><?php echo $atlet['CNP']; ?></td>
        <td><?php echo $atlet['Data_nasterii']; ?></td>
        <td><?php echo $atlet['Email']; ?></td>
        <td><?php echo $atlet['Telefon']; ?></td>
        <td><?php echo $atlet['Strada']; ?></td>
        <td><?php echo $atlet['Numar']; ?></td>
        <td><?php echo $atlet['Oras']; ?></td>
        <td><?php echo $atlet['Judet']; ?></td>
        <td><?php echo $atlet['Club_sportiv']; ?></td>
        <td><?php echo $atlet['Sex']; ?></td>

    <td>
    <a href="<?php echo 'http://localhost/sport/'; ?>admin/update_atleti.php?id=<?php echo $atlet['AtletID']; ?>" class="btn-secondary">Update Atlet</a>
   
    <a href="<?php echo 'http://localhost/sport/'; ?>admin/delete_atleti.php?id=<?php echo $atlet['AtletID']; ?>" class="btn-danger">Delete Atlet</a>
</td>
</tr>
<?php endforeach; ?>

</table>

</div>

</div>

<?php include('partials/footer.php'); ?> 

