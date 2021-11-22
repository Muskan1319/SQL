<?php
include("connection.php");
//delete details 
 if(!empty($_GET['del'])){
     $id=$_GET['del'];
     if(mysqli_query($conn,"delete from details where id=$id")){
         header("location:details.php");
     }
 }
?>
<!DOCTYPE html>
<html>
    <body>
        <h2>Employee Details </h2>
        <table border=1>
            <tr>
                <td colspan="8" align="center">
                    <a href="addemployee.php"> Add Details </a>
                </td>
            </tr>
            <tr>
                <th>S.no</th>
                <th>Email</th>
                <th>Uname</th>
                <th>Name</th>
                <th>Age </th>
                <th>City </th>
                <th>Gender</th>
                <th> Actions </th>
            </tr>
        <?php 
        $sel=mysqli_query($conn,"select * from details order by created_at desc");
          if(mysqli_num_rows($sel)>0){
              $sn=1;
             while($arr=mysqli_fetch_assoc($sel)){
                 ?>
                 <tr>
                     <td><?php echo $sn;?></td>
                     <td><?php echo $arr['email'];?></td>
                     <td><?php echo $arr['uname'];?></td>
                     <td><?php echo $arr['name'];?></td>
                     <td><?php echo $arr['age'];?></td>
                     <td><?php echo $arr['city'];?></td>
                     <td><?php echo $arr['gender'];?></td>
                     <td>
                        <a href="editemployee.php?edit=<?php echo $arr['id'];?>">Edit</a> 
                         &nbsp; &nbsp; &nbsp; 
                        <a href="?del=<?php echo $arr['id'];?>">Delete</a></td>
                 </tr>
                 <?php
                 $sn++;
             }
          }

          
          else {
            ?>
         <tr>
             <td colspan="8" align="center"> No records found </td>
         </tr>
            <?php 
          }
        ?>
        </table>
    </body>
</html>