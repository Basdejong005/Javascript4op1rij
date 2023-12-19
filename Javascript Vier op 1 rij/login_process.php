
<?php
require_once("config.php");
if(isset($_POST['sublogin'])){
    $login = $_POST['login_var'];
    $password = $_POST['password'];

    $login2 = $_POST['login_var2'];
    $password2 = $_POST['password2'];
    $_SESSION["login_username"]=$login  ;
    $_SESSION["login_username2"]=$login2  ;

    $query = "select * from users where ( username='$login'  )";
    $res = mysqli_query($dbc,$query);
    $numRows = mysqli_num_rows($res);
    if($numRows  == 1){
        $row = mysqli_fetch_assoc($res);
        if(password_verify($password,$row['password'])){
            $_SESSION["login_sess"]="1";
           // $_SESSION["login_username"]= $row['username'];
            $_SESSION["login_username2"]=  $login2;
            //header("location:account.php");



            $query2 = "select * from users where ( username='$login2'  )";
            $res2 = mysqli_query($dbc,$query2);
            $numRows2 = mysqli_num_rows($res2);
            if($numRows2  == 1){
                $row2 = mysqli_fetch_assoc($res2);
                if(password_verify($password2,$row2['password'])){
                    $_SESSION["login_sess"]="1";
                   // $_SESSION["login_username2"]= $row2['username'];
                    header("location:menu.html");
                }
                else{
                    header("location:login.php?loginerror=".$login2);
                }


            }
            else{
                header("location:login.php?loginerror=".$login2);
            }



        }
        else{
            header("location:login.php?loginerror=".$login);
        }


    }
    else{
        header("location:login.php?loginerror=".$login);
    }



}
?>