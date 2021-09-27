
<?php
if(isset($_POST['check'])){
    $connection= mysqli_connect('localhost','root','','login_bar');
    $username    = $_POST['username'];
    $lastname    = $_POST['lastname'];
    $email       = $_POST['email'];
    $phonenumber = $_POST['phone_number'];
    $password    = $_POST['password'];
    $cpassword   = $_POST['confirm_password'];
    $companyname = $_POST['company_name'];
    $pincode     = $_POST['pin_code'];
    $compadress  = $_POST['company_address'];
    $email_query     = "SELECT*FROM login WHERE email='$email'";
    $email_query_run = mysqli_query($connection, $email_query);
    $phone_query     = "SELECT*FROM login WHERE phone_number='$phonenumber'";
    $phone_query_run = mysqli_query($connection, $phone_query);
  if(mysqli_num_rows($email_query_run)> 0){
      echo "<br>";
      echo "email id already exist";}
 elseif(mysqli_num_rows($phone_query_run)> 0){
     echo "<br>";
     echo "phone number already exist";

}
 else{  if($password === $cpassword){
    $username    = mysqli_real_escape_string($connection,$username);
    $lastname    = mysqli_real_escape_string($connection,$lastname);
    $email       = mysqli_real_escape_string($connection,$email);
    $phonenumber = mysqli_real_escape_string($connection,$phonenumber);
    $password    = mysqli_real_escape_string($connection,$password);
    $salt        = "iusesomecrazystrings22";
    $password    = crypt($password,$salt);
    $query       = "INSERT INTO login(username,lastname,email,phone_number,password,company_name,pin_code,company_address)";
    $query      .= "VALUES('$username','$lastname','$email','$phonenumber','$password','$companyname','$pincode','$compadress')";
    $result      = mysqli_query($connection,$query);
     if(!$result){
        die('query failed'.mysqli_error($connection));
    }
     
    
    }

     

else{
    echo "<br>";
    echo "password dosnt match";
} 
}  }

     
    
           
            
            
        
         
        
        
            
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="col-sm-6">
            
             <form action="login_update_dlete.php" method="post">
             <div class="form-group">
             <label for="username">First Name</label>
             <input type="text" name="username" class="form-control" placeholder="enter your first name">
             <label for="lastname">Last Name</label>
             <input type="text" name="lastname" class="form-control" placeholder="enter your last name">
             <label for="email">Email ID</label>
             <input type="text" name="email" class="form-control" placeholder="enter your email id">
             <label for="phone_number">Phone Number</label>
             <input type="numbers" name="phone_number" pattern="{0-9}{10}" maxlength="10" class="form-control" placeholder="enter your phone number">
             
</div>
<div class ="form-group">
<label for="Password">Password</label>
 <input type="password" name="password" class="form-control" placeholder="enter your password">
 </div>
 <div class ="form-group">
<label for="confirm_Password">Confirm Password</label>
 <input type="password" name="confirm_password" class="form-control" placeholder="confirm password">
 </div>
          <label for="company_name">Company Name</label>
             <input type="text" name="company_name" class="form-control" placeholder="enter your company name">
             <label for="pin_code">Pin Code</label>
             <input type="numbers" name="pin_code" pattern="[0-9]{6}" maxlength="6" class="form-control" placeholder="enter your pin code">
             <label for="company_address">Company Adress</label>
             <input type="text" name="company_address" class="form-control" placeholder="enter your company adress">
             <label for="company_address">i agree all your terms and conditions</label>
             <input type="checkbox" name="check">
 <div class ="form-group">

 </div>
 <input class="btn btn-primary" type="submit" name="submit" value="submit">





</form>

            
    
</body>
</html>