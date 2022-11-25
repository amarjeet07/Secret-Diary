<?php
//db server: sdb-54.hosting.stackcp.net
//db name: secretdiary-353030363774
//db password: nmzrch1rt2



if(array_key_exists("submit",$_POST)){

$link = mysqli_connect("sdb-54.hosting.stackcp.net",
"secretdiary-353030363774",
"nmzrch1rt2",
"secretdiary-353030363774");
if(mysqli_connect_error()){
    die("data Connection Error");
}




    $error="";
    if(!$_POST['email']){
        $error .="An email addres is required.<br>";
    }
    if(!$_POST['password']){
        $error .="A password is required.<br>";
    }
    if($error !=""){
        $error="<p>There were error(s) in your form!</p>" .$error;
    } 
    else{
        //No error check validity
        $emailAddress = mysqli_real_escape_string($link, $_POST['email']);
        //for duplicate
        $query ="SELECTT id FROM Users WHERE email ='" .$emailAddress . "' LIMIT 1";

        $result = mysqli_query($link, $query);
        if(mysqli_num_rows($result) > 0){
           $error = "That email addres is taken."
        }
        else{
          $password = mysqli_real_escape_string($link, $_POST['password']);
          $password =password_hash($password, PASSWORD_DEFAULT);

          $query= "INSERT INTO Users (email, password) VALUES ('" , $emailaddress . "', '" . $password . "')";

          if(!mysqli_query($link, $query)){
             $error .= "<p>Could not sign you up - Please try again later.</p>";
             $error .="<p>" . mysqli_error($link) . "</p>";
          }
          else{
          echo "sign up successful!";
          }//end if for successful/failed sign up



          
        }//end if mysqli_num_rows test


    }//end of error existing check

}//end if the submit exists
?>




<div id="error"><?php echo $error; ?></div>


<form method="post">
    <input type="email" name="email" placeholder="youremail">
    <input type="password" name="password" placeholder="password">
    <input type="checkbox" name="stayLoggedIn" value="1">
    <input type="submit" name="submit" value="Sign Up!">
</form>