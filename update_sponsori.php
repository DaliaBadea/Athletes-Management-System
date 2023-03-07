<?php include('partials/meniu.php'); ?>

<div class="main-content">
    <div class="wrapp">
        <h1>Update Sponsor</h1>
        <br><br>

       <?php $sponsorID = (int) $_GET['id']; 
         $query = "SELECT * FROM Sponsori_principali WHERE SponsorId=$sponsorID";
         $result = mysqli_query($connection, $query);
         $sponsor = $result->fetch_assoc();
       ?>

        <!-- Adauga Sponsor Form Starts -->
        <form action="" method="POST">
           <table> 
             
            <tr>
                <td>Cod_sponsor: </td>
                <td>
                  <input type="text" name="Cod_sponsor" placeholder="Cod_sponsor" value="<?= $sponsor['Cod_sponsor']; ?>">  
                </td>
            </tr>

            <tr>
                <td>Denumire: </td>
                <td>
                <input type="text" name="Denumire" placeholder="Denumire" value="<?= $sponsor['Denumire']; ?>">  
                </td>
            </tr>

            <tr>
                <td>An_colaborare: </td>
                <td>
                <input type="text" name="An_colaborare" placeholder="An_colaborare" value="<?= $sponsor['An_colaborare']; ?>">
                </td>
            </tr>

            <tr>
                <td>Telefon: </td>
                <td>
                  <input type="text" name="Telefon" placeholder="Telefon" value="<?= $sponsor['Telefon']; ?>">  
                </td>
            </tr>

            <tr>
                <td>Email: </td>
                <td>
                <input type="text" name="Email" placeholder="Email" value="<?= $sponsor['Email']; ?>">   
                </td>
            </tr>

            <tr>
                <br>
                <td colspan="2">
                    <input type="submit" name="submit" value="Update Sponsor" class="btn-secondary">
                </td>
            </tr>

           </table>
        </form>

         <!-- Adauga Atlet Form Ends -->

         <?php
        //Check whether the submit botton is clicked or not
         if(isset($_POST['submit']))
         {
            //echo "Inserat";

            //1. Get the value from Form
             $Cod_sponsor = $_POST['Cod_sponsor'];
             $Denumire = $_POST['Denumire'];
             $An_colaborare = $_POST['An_colaborare'];
             $Telefon = $_POST['Telefon'];
             $Email = $_POST['Email'];
         
         //2. Create SQL query to insert Atleti in baza de date+
           $sql = "UPDATE Sponsori_principali SET 
           Cod_sponsor='$Cod_sponsor',
           Denumire='$Denumire',
           An_colaborare='$An_colaborare',
           Telefon='$Telefon',
           Email='$Email'
           WHERE SponsorID='$sponsorID'
         ";


        if ($Cod_sponsor && $Denumire && $An_colaborare && $Telefon && $Email) {
            $res = mysqli_query($connection, $sql);
            echo "<script>location.replace('sponsori_principali.php');</script>";
        }
        else
            {
                echo "<script>location.replace('update_sponsori.php?id=$sponsorID);</script>";
            }
        }

         ?> 

<br /> <br /> <br />
<br /> <br /> <br />
<br /> <br /> <br />
<br /> <br /> <br />
<br /> <br /> <br />
<br /> <br /> <br />

    </div>
</div>

<?php include('partials/footer.php'); ?>