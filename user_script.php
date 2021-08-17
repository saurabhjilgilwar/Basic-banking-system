<?php
// require 'includes/common.php';
$name=mysqli_real_escape_string($con,$_POST['fname']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$gender=mysqli_real_escape_string($con,$_POST['gender']);
$balance=mysqli_real_escape_string($con,$_POST['balance']);
$len = strlen($name);
$select="SELECT users_id,email FROM users WHERE email='$email'";
$select_query=mysqli_query($con,$select);
$row= mysqli_num_rows($select_query);
if (($balance) < 100 ){
    echo "<script> alert('minimum balance should be 100rs');
    window.location='users.php';
    </script>";
}
else if (($len)< 3 ){
    echo "<script> alert('enter full name');
    window.location='create.php';
    </script>";
}
else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    echo "<script> alert('invalid email format');
    window.location='create.php';
    </script>";
}
else if($row >0){
    echo "<script> alert('user existed');
    window.location='create.php';
    </script>";
}
else{
$insert="insert into users(fname, email, gender, balance) values('$name','$email', '$gender','$balance')";
$insert_query=mysqli_query($con,$insert);
if($insert_query){
    echo "<script> alert('user creation successful');
    window.location='users.php';
    </script>";
}

}
?>
