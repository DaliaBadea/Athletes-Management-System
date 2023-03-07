<?php include('partials/meniu.php'); ?>


<div class="main-content"> 
    <div class="wrapper">
       <h1>Date Sponsori Principali</h1>
       <br />

<!--Button to Add Atlet -->
<a href="insert_sponsori.php" class="btn-primary">Adauga Sponsor</a>

<br /> <br /> <br />
<?php
$query = "SELECT * FROM sponsori_principali";
$result = mysqli_query($connection, $query);
$sponsori_principali = [];
while($row = $result->fetch_assoc()) {
    $sponsori_principali[] = $row;
}

?>
<table class="tbl-full", border = "1">
<!-- <table border="1"> -->
<tr>
<th>Cod sponsor</th>
<th>Denumire</th>
<th>An colaborare</th>
<th>Telefon</th>
<th>Email</th>
<th>Actiuni</th>
</tr>

<?php foreach ($sponsori_principali as $sponsor):?>
<tr data-id="<?php echo $sponsor['SponsorID']; ?>">
    <td><?php echo $sponsor['Cod_sponsor']; ?></td>
    <td><?php echo $sponsor['Denumire']; ?></td>
    <td><?php echo $sponsor['An_colaborare']; ?></td>
    <td><?php echo $sponsor['Telefon']; ?></td>
    <td><?php echo $sponsor['Email']; ?></td>
    <td>
    <a href="<?php echo 'http://localhost/sport/'; ?>admin/update_sponsori.php?id=<?php echo $sponsor['SponsorID']; ?>" class="btn-secondary">Update Sponsor</a>
   
    <a href="<?php echo 'http://localhost/sport/'; ?>admin/delete_sponsori.php?id=<?php echo $sponsor['SponsorID']; ?>" class="btn-danger">Delete Sponsor</a>
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

