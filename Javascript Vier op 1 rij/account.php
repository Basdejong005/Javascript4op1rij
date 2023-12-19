<?php require_once("config.php");
if(!isset($_SESSION["login_sess"]))
{
    header("location:login.php");
}
$username=$_SESSION["login_username"];
$username2=$_SESSION["login_username2"];
?>
<!DOCTYPE html>
<html lang="">
<head>
    <title> Accounts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheetlogin.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-3">

        </div>
        <div class="col-sm-6">
            <div class="login_form">
                Accounts

                <div class="row">
                    <div class="col"></div>
                    <div class="col-6">
                        <?php if(isset($_GET['profile_updated']))
                        { ?>
                            <div class="successmsg">Profile saved ..</div>
                        <?php } ?>
                        <?php if(isset($_GET['password_updated']))
                        { ?>
                            <div class="successmsg">Password has been changed...</div>
                        <?php } ?>
                        <div style="text-align: center;">


                            <p> Welcome! </p>

                        </div>
                    </div>
                    <div class="col"><p><a href="logout.php"><span style="color:red;">Log uit</span> </a></p>
                    </div>
                </div>

                <table class="table">
                    <tr>
                        <th>Username </th>
                        <td><?php echo $username; ?></td>
                    </tr>
                    <tr>
                        <th>Username </th>
                        <td><?php echo $username2; ?></td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-4">
                        <a href="edit-profile.php"><button type="button" class="btn btn-primary">Wijzig profiel</button></a>
                    </div>
                    <div class="col-sm-6">
                        <a href="change-password.php"><button type="button" class="btn btn-warning">Verander profiel</button></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>


