<?php include('partials/meniu.php'); ?>

<div class="main-content">
    <div class="wrapp">
        <h1>Insert Sponsor</h1>
        <br><br>

        <!-- Adauga Sponsor Form Starts -->
        <form action="" method="POST">
           <table> 
           <tr>
                <td>Cod_sponsor: </td>
                <td>
                  <input type="text" name="Cod_sponsor" placeholder="Cod_sponsor">  
                </td>
            </tr>
            
            <tr>
                <td>Denumire: </td>
                <td>
                  <input type="text" name="Denumire" placeholder="Denumire">  
                </td>
            </tr>

            <tr>
                <td>An colaborare: </td>
                <td>
                  <input type="text" name="An_colaborare" placeholder="An_colaborare">  
                </td>
            </tr>

            <tr>
                <td>Telefon: </td>
                <td>
                  <input type="text" name="Telefon" placeholder="Telefon">  
                </td>
            </tr>

            <tr>
                <td>Email: </td>
                <td>
                  <input type="text" name="Email" placeholder="Email">  
                </td>
            </tr>

            <tr>
                <br>
                <td colspan="2">
                    <input type="submit" name="submit" value="Insert Sponsor" class="btn-secondary">
                </td>
            </tr>

           </table>
        </form>

         <!-- Adauga Sponsor Form Ends -->

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

         //2. Create SQL query to insert Atleti in baza de date
           $sql = "INSERT INTO sponsori_principali SET 
           Cod_sponsor='$Cod_sponsor',
           Denumire='$Denumire',
           An_colaborare='$An_colaborare',
           Telefon='$Telefon',
           Email='$Email'
         ";

        if ($Cod_sponsor && $Denumire && $An_colaborare && $Telefon && $Email) {
            $res = mysqli_query($connection, $sql);
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
           echo "<script>location.replace('sponsori_principali.php');</script>";
        }
        else
            {
                echo "<script>location.replace('insert_sponsori.php');</script>";
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