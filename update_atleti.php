<?php include('partials/meniu.php'); ?>

<div class="main-content">
    <div class="wrapp">
        <h1>Update Atlet</h1>
        <br><br>
       <?php 
         $query = "SELECT ProbaID, Denumire_p FROM probe";
         $result = mysqli_query($connection, $query);
         $probe = [];
         while($row = $result->fetch_assoc()) {
             $probe[] = $row;
         }
       ?>

        <?php 
         $query = "SELECT SponsorID, Denumire FROM sponsori_principali";
         $result = mysqli_query($connection, $query);
         $sponsori_principali = [];
         while($row = $result->fetch_assoc()) {
             $sponsori_principali[] = $row;
         }
       ?>
       <?php $atletID = (int) $_GET['id']; 
         $query = "SELECT * FROM Atleti WHERE AtletId=$atletID";
         $result = mysqli_query($connection, $query);
         $atlet = $result->fetch_assoc();
       ?>

        <!-- Adauga Atlet Form Starts -->
        <form action="" method="POST">
           <table> 
             <tr>
                <td><label for="ProbaID">Proba:</label> </td>
                <td>
                    <select name="ProbaID">
                        <?php foreach ($probe as $proba): ?>
                            <?php if ($proba['ProbaID'] == $atlet['ProbaID']): ?>
                          <option value="<?= $proba['ProbaID'] ?>" selected><?= $proba['Denumire_p'] ?></option>
                          <?php else: ?>
                            <option value="<?= $proba['ProbaID'] ?>"><?= $proba['Denumire_p'] ?></option>
                         <?php endif; ?>
                        <?php endforeach; ?>
                    </select> 
                </td>
            </tr>

            <tr>
                <td><label for="SponsorID">Sponsor:</label> </td>
                <td>
                    <select name="SponsorID">
                        <?php foreach ($sponsori_principali as $sponsor): ?>
                          <option value="<?= $sponsor['SponsorID'] ?>" <?php echo ($sponsor['SponsorID'] == $atlet['SponsorID'] ? "selected" : "")?>><?= $sponsor['Denumire'] ?></option>
                        <?php endforeach; ?>
                    </select> 
                </td>
            </tr>
             
            <tr>
                <td>Nume: </td>
                <td>
                  <input type="text" name="Nume" placeholder="Nume" value="<?= $atlet['Nume']; ?>">  
                </td>
            </tr>

            <tr>
                <td>Prenume: </td>
                <td>
                <input type="text" name="Prenume" placeholder="Prenume" value="<?= $atlet['Prenume']; ?>">  
                </td>
            </tr>

            <tr>
                <td>CNP: </td>
                <td>
                <input type="text" name="CNP" placeholder="CNP" value="<?= $atlet['CNP']; ?>">
                </td>
            </tr>

            <tr>
                <td>Data nasterii: </td>
                <td>
                  <input type="text" name="Data nasterii" placeholder="Data_nasterii" value="<?= $atlet['Data_nasterii']; ?>">  
                </td>
            </tr>

            <tr>
                <td>Email: </td>
                <td>
                <input type="text" name="Email" placeholder="Email" value="<?= $atlet['Email']; ?>">   
                </td>
            </tr>

            <tr>
                <td>Telefon: </td>
                <td>
                <input type="text" name="Telefon" placeholder="Telefon" value="<?= $atlet['Telefon']; ?>">    
                </td>
            </tr>

            <tr>
                <td>Strada: </td>
                <td>
                <input type="text" name="Strada" placeholder="Strada" value="<?= $atlet['Strada']; ?>">    
                </td>
            </tr>

            <tr>
                <td>Numar: </td>
                <td>
                <input type="text" name="Numar" placeholder="Numar" value="<?= $atlet['Numar']; ?>">    
                </td>
            </tr>

            <tr>
                <td>Oras: </td>
                <td>
                <input type="text" name="Oras" placeholder="Oras" value="<?= $atlet['Oras']; ?>">    
                </td>
            </tr>

            <tr>
                <td>Judet: </td>
                <td>
                <input type="text" name="Judet" placeholder="Judet" value="<?= $atlet['Judet']; ?>">    
                </td>
            </tr>

            <tr>
                <td>Club sportiv: </td>
                <td>
                <input type="text" name="Club_sportiv" placeholder="Club sportiv" value="<?= $atlet['Club_sportiv']; ?>">    
                </td>
            </tr>

            <tr>
                <td>Sex: </td>
                <td>
                <input type="text" name="Sex" placeholder="Sex" value="<?= $atlet['Sex']; ?>">    
                </td>
            </tr>
            <tr>
                <br>
                <td colspan="2">
                    <input type="submit" name="submit" value="Update Atlet" class="btn-secondary">
                </td>
            </tr>

           </table>
        </form>

         <!-- Adauga Atlet Form Ends -->

         <?php
        //Check whether the submit botton is clicked or not
         if(isset($_POST['submit']))
         {
            

            //1. Get the value from Form
             $ProbaID = $_POST['ProbaID'];
             $SponsorID = $_POST['SponsorID'];
             $Nume = $_POST['Nume'];
             $Prenume = $_POST['Prenume'];
             $CNP = $_POST['CNP'];
             $Data_nasterii = $_POST['Data_nasterii'];
             $Email = $_POST['Email'];
             $Telefon = $_POST['Telefon'];
             $Strada = $_POST['Strada'];
             $Numar = $_POST['Numar'];
             $Oras = $_POST['Oras'];
             $Judet = $_POST['Judet'];
             $Club_sportiv = $_POST['Club_sportiv'];
             $Sex = $_POST['Sex'];

         
         //2. Create SQL query to update Atleti in baza de date
         $sql = "UPDATE Atleti SET 
           ProbaID='$ProbaID',
           SponsorID='$SponsorID',
           Nume='$Nume',
           Prenume='$Prenume',
           Cnp='$CNP',
           Data_nasterii='$Data_nasterii',
           Email='$Email',
           Telefon='$Telefon',
           Strada='$Strada',
           Numar='$Numar',
           Oras='$Oras',
           Judet='$Judet',
           Club_sportiv='$Club_sportiv',
           Sex='$Sex'
           WHERE AtletID='$atletID'
         ";

        //  $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
        //  $db_select = mysqli_select_db($conn, 'sport') or die(mysqli_error());

        if ($ProbaID && $SponsorID && $Nume && $Prenume && $CNP && $Data_nasterii && $Email && $Telefon && $Strada && $Numar && $Oras && $Judet && $Club_sportiv && $Sex) {
            $res = mysqli_query($connection, $sql);
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            echo "<script>location.replace('atleti.php');</script>";
        }
        else
            {
                // header('location:'.'http://localhost/sport/'.'admin/insert_atleti.php');
                // exit(0);
                echo "<script>location.replace('update_atleti.php?id=$atletID);</script>";
            }
        }

         ?> 

<br /> <br /> <br />
<br /> <br /> <br />

    </div>
</div>

<?php include('partials/footer.php'); ?>