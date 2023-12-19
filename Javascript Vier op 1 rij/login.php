<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html>
<head><br>
    <title> Login - 4 op een rij</title>
    <link rel="icon" type="image/png" href="img/download.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheetlogin.css">
    <style>body{background: #71fcfc;
        }</style>
</head>
<body id="bodylogin">
<div class="container">
    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <div class="login_form">
                <form action="login_process.php" method="POST">
                    <div class="form-group">
                        Inloggen
                        <img src="img/download.jpg" alt="vier op een rij logo" class="logovieropeenrij" "> <br>
                        <?php
                        if(isset($_GET['loginerror'])) {
                            $loginerror=$_GET['loginerror'];
                        }
                        if(!empty($loginerror)){  echo '<p class="errmsg">Een van de spelers heeft zijn wachtwoord fout, Probeer opnieuw..</p>'; } ?>
                        <h2>Speler 1</h2>
                        <label class="label_txt">Naam</label>
                        <input type="text" name="login_var" value="<?php if(!empty($loginerror)){ echo  $loginerror; } ?>" class="form-control" required="">


                        <label class="label_txt">Wachtwoord </label>
                        <input type="password" name="password" class="form-control" required="">
                        <h2>Speler 2</h2>
                        <label class="label_txt">Naam</label>
                        <input type="text" name="login_var2" value="<?php if(!empty($loginerror)){ echo  $loginerror; } ?>" class="form-control" required="">


                        <label class="label_txt">Wachtwoord </label>
                        <input type="password" name="password2" class="form-control" required="">
                    </div>


                    <button type="submit" name="sublogin" class="btn btn-primary btn-group-lg form_btn">Login</button>
                </form>
                <p style="font-size: 12px;text-align: center;margin-top: 10px;"><a href="" style="color: #00376b;">Wachtwoord vergeten?</a> </p>
                <br>
                <p>Geen account? <a href="signup.php">Registreer</a> </p>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
