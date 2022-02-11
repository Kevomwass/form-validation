<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form validation</title>
</head>
<style>
    body{
        margin: 0;
        padding: 0;
    }
    .input{
        background-color: rgba(60,20,40,0.4);
        width: 400px;
        margin-left: 500px;
        margin-top: 50px;
        padding: 20px;
        border-radius: 15px;
    }
    textarea{
     margin-left: 65px;
        border-radius: 20px;
        padding: 5px;
    }
    .put{
       margin-left: 45px;
        display: inline;
        background-color: transparent;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom-color: lavender;
    }
    .iput{
       margin-left: 50px;
        background-color: transparent;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom-color: lavender;
    }
    .oput{
      margin-left: 25px;
        background-color: transparent;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom-color: lavender;
    }
    .output{
        background-color: rgba(60,20,40,0.4);
        width: 200px;
        height: 150px;
        margin-left: 500px;
        padding: 15px;
        border-radius: 15px;
        margin-top: 30px;


    }
    .button{
        color: black;
        background-color: silver;
        border-radius: 12px;
        padding: 6px;
    }
    label{
        font-style: italic;
        font-size: large;
        font-weight: bolder;
    }
    .red{
        color: red;
    }

</style>
<body>

<div class="input">
<?php
$username=$email=$hobby = "";
$usernameErr=$emailErr=$hobbyErr = "";

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    if (empty($_POST["username"])){
        $usernameErr=  "Username is required";
    }else{
        $username = userdata($_POST["username"]);
    if (!preg_match("/^[a-zA-Z\s]*$/",$username)){
        $usernameErr = "Only letters and white space allowed";
    }
    }

    if (empty($_POST["email"])){
        $emailErr = "email is required";
    }else {
         $email = userdata($_POST["email"]);
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $emailErr = "invalid email format";
    }
    }
    if (empty($_POST["hobby"])){
        $hobbyErr = "hobby is required";
    } else{
    $hobby = userdata($_POST["hobby"]);
if (preg_match("/^[a-zA-Z-']*$/",$hobby)){
  $hobbyErr = "Only letters and white spaces allowed";
}
    }
}



    function userdata($userinfo){
    $userinfo = trim($userinfo);
    $userinfo = stripslashes($userinfo);
    $userinfo = htmlspecialchars($userinfo);
    return $userinfo;
    }



?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <p class="red">*required field</p>
    <label>Username</label>
    <input type="text" name="username" placeholder="Enter your username" class="oput">
    <span class="red">*<?php echo $usernameErr; ?></span>

    <br><br>

    <label>Email</label>
    <input type="email" name="email" placeholder="Enter your email" class="iput">
    <span class="red">*<?php echo $emailErr;?></span>

    <br><br>

    <label>Hobby</label>
    <input type="text" name="hobby" placeholder="Enter your hobby" class="put">
    <span class="red">*<?php echo $hobbyErr;?></span>
    <br><br>


    <textarea rows="5" cols="40" placeholder="Enter comment"></textarea>

    <br>

    <input type="submit" name="btn" class="button">
</form>

<br>

</div>

<div class="output">
<h3>The Output</h3>
<?php
echo $username;
echo "<br>";
echo $email;
echo "<br>";
echo $hobby;

?>
</div>
</body>
</html>
