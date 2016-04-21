<div class="login col-md-6 col-md-offset-3">  <!-- Start of showing vacancy's -->
  <p>
    Log in om te kunnen solliciteren
  </p>
  <form method="post">
    <div class="form-group">
      <label for="username">Inlognaam</label>
      <input type="text" name="username" class="form-control" id="username" placeholder="Voer inlognaam in">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Voer wachtwoord aan  ">
    </div>
    <div class="form-group">
      <a href="register.php">Heb je nog geen account? Registreer je dan hier! </a>
    </div>
    <button type="submit" class="btn btn-default custombutton" name="submit">Submit</button>
  </form>
  <?php
    if(isset($_POST["submit"])) {
      $get_user = $user->get_single_user($_POST['username']);
      $login = $user->user_login($_POST['username'], $get_user['salt'], $_POST['password']);
      if($login > 0) {
        $_SESSION["user_login"] = 1;
        $_SESSION['username'] = $_POST["username"];
        echo '<script>location.href="solliciteren.php?vacatureID='.$_GET['vacatureID'].'"</script>';
      } elseif(empty($_POST['username']) || empty($_POST['password'])) {
        echo 'Zorg dat alle velden zijn ingevuld.';
      } else {
        echo 'Gebruikersnaam of wachtwoord fout.';
     }
   }

   ?>
</div>
