<?php include('partials/meniu.php'); ?>

<div class="main-content"> 
    <div class="wrapper">
       <h1>Date Antrenori</h1>

       <br />

<!--Button to Add Antrenor -->
<a href="insert_antrenori.php" class="btn-primary">Adauga Antrenor</a>
<br /> <br /> <br />

<?php

$query = "SELECT * FROM antrenori";
$result = mysqli_query($connection, $query); //res
$count = mysqli_num_rows($result);
$antrenori = [];
while($row = $result->fetch_assoc()) {
    $antrenori[] = $row;
}

if($count > 0) 
 {
     while($row=mysqli_fetch_assoc($result))
     {
        $AntrenorID = $row['AntrenorID'];
     }
    }

?>

<table class="tbl-full", border = "1">
<!-- <table border="1"> -->
<tr>

<th>Nume</th>
<th>Prenume</th>
<th>CNP</th>
<th>Data_colaborare</th>
<th>Telefon</th>
<th>Strada</th>
<th>Numar</th>
<th>Oras</th>
<th>Judet</th>
<th>Email</th>
<th>Sex</th>
<th>Actiuni</th>

</tr>

<?php foreach ($antrenori as $antrenor):?>
<tr data-id="<?php echo $antrenor['AntrenorID']; ?>">
    <td><?php echo $antrenor['Nume']; ?></td>
    <td><?php echo $antrenor['Prenume']; ?></td>
    <td><?php echo $antrenor['CNP']; ?></td>
    <td><?php echo $antrenor['Data_colaborare']; ?></td>
    <td><?php echo $antrenor['Telefon']; ?></td>
    <td><?php echo $antrenor['Strada']; ?></td>
    <td><?php echo $antrenor['Numar']; ?></td>
    <td><?php echo $antrenor['Oras']; ?></td>
    <td><?php echo $antrenor['Judet']; ?></td>
    <td><?php echo $antrenor['Email']; ?></td>
    <td><?php echo $antrenor['Sex']; ?></td>

    <td>
    <a href="<?php echo 'http://localhost/sport/'; ?>admin/update_antrenori.php?id=<?php echo $antrenor['AntrenorID']; ?>" class="btn-secondary">Update Antrenor<br></a>
   
    <a href="<?php echo 'http://localhost/sport/'; ?>admin/delete_antrenori.php?id=<?php echo $antrenor['AntrenorID']; ?>" class="btn-danger">Delete Antrenor</a>
</td>
</tr>
<?php endforeach; ?>

</table>

<br /> <br /> <br />
<br /> <br /> <br />
<br /> <br /> <br />

</div>

</div>

<?php include('partials/footer.php'); ?> 

