<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html>
<head>
    <title> Registreer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheetlogin.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">
        </div>
    </div>
    <div class="row">
        <?php
        if(isset($_POST['signup'])){
            extract($_POST);
            if(strlen($username)<3){ // Change Minimum Lenghth
                $error[] = 'Gebruikersnaam minimaal 3 karakters.';
            }
            if(strlen($username)>50){ // Change Max Length
                $error[] = 'Gebruikersnaam : Maximaal 50 karakters';
            }
            if(!preg_match("/^^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/", $username)){
                $error[] = 'Geen spatie en getal aan het begin';
            }
            if($passwordConfirm ==''){
                $error[] = 'Bevestig wachtwoord.';
            }
            if($password != $passwordConfirm){
                $error[] = 'Wachtwoord is niet hetzelfde.';
            }
            if(strlen($password)<5){ // min
                $error[] = 'Wachtwoord minimaal 6 karakters.';
            }

            if(strlen($password)>20){ // Max
                $error[] = 'Wachtwoord minimaal 20 karakters';
            }
            $sql="select * from users where (username='$username');";
            $res=mysqli_query($dbc,$sql);
            if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);

                if($username==$row['username'])
                {
                    $error[] ='Gebruikersnaam bestaat al.';
                }

            }
            if(!isset($error)){
                $date=date('Y-m-d');
                $options = array("cost"=>4);
                $password = password_hash($password,PASSWORD_BCRYPT,$options);

                $result = mysqli_query($dbc,"INSERT into users(username,password,date) values('$username','$password','$date')");

                if($result)
                {
                    $done=2;
                }
                else{
                    $error[] ='Fout : Iets ging fout';
                }
            }
        } ?>

        <div class="col-sm-4">

            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<p class="errmsg">&#x26A0;'.$error.' </p>';
                }
            }
            ?>
        </div>
        <div class="col-sm-4">
            <?php if(isset($done))
            { ?>
                <div class="successmsg"><span style="font-size:100px;">&#9989;</span> <br> Je bent geregistreerd. <br> <a href="login.php" style="color:#fff;">Klik hier om in te loggen... </a> </div>
            <?php } else { ?>
            <div class="signup_form">
                Registreer
                <img src="img/download.jpg" alt="Techno Smarter" class="logovieropeenrij" "> <br>
                <form action="" method="POST">


                    <div class="form-group">
                        <label class="label_txt">Gebruikersnaam </label>
                        <input type="text" class="form-control" name="username" value="<?php if(isset($error)){ echo $_POST['username'];}?>" required="">
                    </div>
                    <div class="form-group">
                        <label class="label_txt">Wachtwoord </label>
                        <input type="password" name="password" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label class="label_txt">Bevestig wachtwoord</label>
                        <input type="password" name="passwordConfirm" class="form-control" required="">
                    </div>
                    <button type="submit" name="signup" class="btn btn-primary btn-group-lg form_btn">Maak account aan</button>
                    <p>Al een account?  <a href="login.php">Log in</a> </p>
                </form>
                <?php } ?>
            </div>
        </div>
        <div class="col-sm-4">
        </div>

    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
