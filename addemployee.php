<?php
include("connection.php");
if(isset($_POST['sub'])){
    $email=$_POST['email'];
    $uname=$_POST['uname'];    
    $name=$_POST['name'];
    $age=$_POST['age'];
    $city=$_POST['city'];
    $gender=$_POST['gender'];
    if(mysqli_query($conn,"insert into details(email,uname,name,age,city,gender) values('$email','$uname','$name',$age,'$city','$gender')")){
        header("location:index.php");
    }
    else {
        echo "Already Added";
    }
} 
?>
<!DOCTYPE html>
<html>
    <body>
        <h2> Add Details </h2>
        <form method="post">
            Email : <input type="text" name="email"/><br/>
            Uname:<input type="text" name="uname"/><br/>
            Name : <input type="text" name="name"><br/>
            Age : <input type="text" name="age"/><br/>
            City : <input type="text" name="city"/><br/>
            Gender:<input type="radio" name="gender" value="male">Male<br/>
            <input type="radio" name="gender" value="female">Female<br/>
        <input type="submit" name="sub" value="Add Details"/>
        </form>
    </body>
</html>