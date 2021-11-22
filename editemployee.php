<?php
include("connection.php");
$id=$_GET['edit'];
$sel=mysqli_query($conn,"select * from details where id=$id");
$arr=mysqli_fetch_assoc($sel);
if(isset($_POST['sub'])){
    $email=$_POST['email'];
    $uname=$_POST['uname'];    
    $name=$_POST['name'];
    $age=$_POST['age'];
    $city=$_POST['city'];
    $gender=$_POST['gender'];
    if(mysqli_query($conn,"update details set email='$email',uname='$uname',name='$name',age=$age,city='$city',gender='$gender' where id=$id")){
        header("location:index.php");
    }
    else {
        echo "Updating error";
    }
} 
?>
<!DOCTYPE html>
<html>
    <body>
        <h2> Edit Details </h2>
        <form method="post">
            Email : <input type="text" name="email" value="<?php echo $arr['email'];?>"/><br/>
            Uname:<input type="text" name="uname" value="<?php echo $arr['uname'];?>"><br/>
            Name : <input type="text" name="name" value="<?php echo $arr['name'];?>"/><br/>
            Age : <input type="text" name="age" value="<?php echo $arr['age'];?>"/><br/>
            City : <input type="text" name="city" value="<?php echo $arr['city'];?>"/><br/>
            Gender:<input type="radio" name="gender" value="<?php echo $arr['gender'];?>">Male<br/>
            <input type="radio" name="gender" value="<?php echo $arr['gender'];?>">Female<br/>
        <input type="submit" name="sub" value="Edit Details"/>
        </form>
    </body>
</html>