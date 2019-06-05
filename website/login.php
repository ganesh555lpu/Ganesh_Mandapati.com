<?php
include 'config.php';

if ($login == 1) {
echo " <meta http-equiv='refresh' content='0; url=profile.php'>";
}else {




if (isset($_POST["u_btn"])) {
  $u_email = $_POST['u_email'];
  $u_pass = $_POST['u_pass'];
  if (empty($u_email) || empty($u_pass)) {
    echo "Please Complet all data";
  }else{
    $selectfdb = mysqli_query($conn,"SELECT * FROM users WHERE u_email = '$u_email' AND u_pass = '$u_pass'");
    $row = mysqli_fetch_array($selectfdb);
    if ($row["u_email"] == $u_email && $row["u_pass"] == $u_pass) {

      setcookie('uid',$row["u_id"],time()+(3600 + 24));
      setcookie('login',1,time()+(3600 + 24));
      echo " <meta http-equiv='refresh' content='0; url=profile.php'>";
    }else {
      echo "Email or Password Incorrect";
    }
  }
}
 ?>

<form  action="login.php" method="post">
  <label>Email</label>
  <input type="email" name="u_email" value=""><br />
  <label>Password</label>
  <input type="password" name="u_pass" value=""><br />
  <input type="submit" name="u_btn" value="sign in"><br />
  <a href="register.php">Sign up</a>
</form>

<?php } ?>
