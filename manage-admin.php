<html>

<?php include ('partials/meniu.php'); ?>

        <!-- Main Content Section Starts --> 
        <div class="main-content">
           <div class="wrapper">
            <h1>Manage Admin</h1>
 
            <br />

            <!--Button to Add Admin -->
            <a href="#" class="btn-primary">Adauga Admin</a>
 

            <br /> <br /> <br />

   <table class="tbl-full"> 
      <tr>

        <th>S.N.</th>
        <th>Nume Complet</th>
        <th>Username</th>
        <th>Actiuni</th>
     </tr>

     <tr>
        <td>1.</td>
        <td>Dalia Badea</td>
        <td>dalia</td>
        <td>
            <a href="#" class="btn-secondary">Update Admin</a>
            <a href="#" class="btn-danger">Delete Admin</a>
        </td>
     </tr>

     <tr>
        <td>2.</td>
        <td>Antonela Baluta</td>
        <td>antonela</td>
        <td>
        <a href="#" class="btn-secondary">Update Admin</a>
            <a href="#" class="btn-danger">Delete Admin</a>
        </td>
     </tr>

     
   </table>
 </div>
</div>
        <!-- Main Content Section Ends -->

<?php include('partials/footer.php'); ?>