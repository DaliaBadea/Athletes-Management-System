<?php include('partials/meniu.php'); ?>

<div class="main-content"> 
    <div class="wrapper">
       <h1>Sustinerea Probelor</h1>

       <br />

<!--Button to Add Atlet -->

<a href="insert_atleti.php" class="btn-primary">Adauga Data Sustinerii Probei</a>

<br /> <br /> <br />

<?php

$query = "SELECT C.CompetitieID, P.ProbaID, C.Denumire, P.Denumire_p, SP.Data_sustinere_proba
          FROM Sustinere_probe SP INNER JOIN Competitii C ON (C.CompetitieID = SP.CompetitieID)
                                  INNER JOIN Probe P ON (SP.ProbaID = P.ProbaID)
          WHERE SP.Data_sustinere_proba BETWEEN '2023-05-10' AND '2023-10-15'
          GROUP BY C.Denumire, P.Denumire_p, SP.Data_sustinere_proba
          ORDER BY C.Denumire DESC";
$result = mysqli_query($connection, $query); //res
$count = mysqli_num_rows($result);
$sustinere_probe = [];
while($row = $result->fetch_assoc()) {
    $sustinere_probe[] = $row;
}

?>

<table class="tbl-full", border = "1">
<!-- <table border="1"> -->
<tr>

<th>Competitie</th>
<th>Denumire proba</th>
<th>Data sustinere proba</th>
<th>Actiuni</th>

</tr>

<?php foreach ($sustinere_probe as $sus_pb):?>
<tr data-id="<?php echo $sus_pb['CompetitieID']; ?>">
    <td><?php echo $sus_pb['Denumire']; ?></td>
    <td><?php echo $sus_pb['Denumire_p']; ?></td>
    <td><?php echo $sus_pb['Data_sustinere_proba']; ?></td>

    <td>
    <a href="<?php echo 'http://localhost/sport/'; ?>admin/update_sustinere_probe.php?id=<?php echo $sus_pb['CompetitieID']; ?>" class="btn-secondary">Update</a>
   
    <a href="<?php echo 'http://localhost/sport/'; ?>admin/delete_sustinere_probe.php?id=<?php echo $sus_pb['CompetitieID']; ?>" class="btn-danger">Delete</a>
</td>
</tr>
<?php endforeach; ?>

</table>

<br /> <br /> <br />


<!-- interogare complexa cu camp variabil -->
<?php

if(isset($_GET['obtine3']) && !empty($_GET['Oras']))
{

$id3 = $_GET['Oras'];
//echo "Nume si prenume atleti care sunt mai tineri decat toti atletii din orasul: ";
echo "<br>";
echo "<br>";                  

$sql3 = "SELECT Nume, Prenume
         FROM Atleti
         WHERE Data_nasterii > ALL(SELECT Data_nasterii FROM Atleti
                                   WHERE Oras = '$id3')";
$result3 = mysqli_query($connection, $sql3);
while($row = mysqli_fetch_array($result3))
    {
        echo " Nume : ". $row['Nume'] ," <br> Prenume : ". $row['Prenume'];
        echo "<br>";
        echo "<br>";
    }

}

?>

<html>

    <head>
        <title> Cautare particulara atleti </title>
        
        <link rel="stylesheet"href="style.css" media="all" />
    </head>
    
<body>
  
    <div class="main_wrapper">
        
        <div class="content_wrapper">

        <form method="GET">
            Nume si prenume atleti care sunt mai tineri decat toti atletii din localitatea: <input type="text" name="Oras" >
            <input type="submit" name="obtine3" value="CAUTA">
        </form>

        </div>
        
        </div>
    
    </div>

  <a href="sustinere_probe.php">Back</a>
</body>

</html>

<br /> <br /> <br />

<!-- interogare simpla cu camp variabil -->

<?php 
// 4.Atletii care au cel putin o competitie frecventata si au sexul...
if(isset($_GET['obtine4']) && !empty($_GET['Sex']))
{

$id4 = $_GET['Sex'];
echo "<br>";

$sql4 = "SELECT A.Nume, A.Prenume
         FROM Atleti A INNER JOIN Competitii_frecventate CF ON (A.AtletID = CF.AtletID)
         WHERE A.Sex = '$id4'
        --  GROUP BY A.Nume, A.Prenume
         HAVING COUNT(CF.Nr_competitii_frecventate) > 1";
$result4 = mysqli_query($connection, $sql4);
while($row = mysqli_fetch_array($result4))
	{
	    echo "Nume : ". $row['Nume'] ,"<br> Prenume : ". $row['Prenume'] ;
	    echo "<br>";
        echo "<br>";
	}
} 

?>

<html>

    <head>
        <title> Cautare particulara </title>
        
        <link rel="stylesheet"href="style.css" media="all" />
    </head>
    
<body>
  
    <div class="main_wrapper">
        
        <div class="content_wrapper">

        <form method="GET">
            -------------------- Nume si prenume atleti care au cel putin o competitie frecventata si au sexul: <input type="text" name="Sex" >
            <input type="submit" name="obtine4" value="CAUTA">
        </form>

        </div>
        
        </div>
        <br /> <br /> <br />
<br /> <br /> <br />
<br /> <br /> <br />
<br /> <br /> <br />

    </div>
</body>

</html>



<br /> <br /> <br />
<br /> <br /> <br />
<br /> <br /> <br />
<br /> <br /> <br />


</div>

</div>



<?php include('partials/footer.php'); ?> 

