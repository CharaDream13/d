<?php
    require_once "../code/all.php";
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $login_or_email_or_phone = $_POST["login_or_email_or_phone"];
        $password = $_POST["password"];
        $stmt= $connect->prepare("SELECT id_user, login, phone, email, first_name, last_name, patronymic, password, id_rule FROM Users WHERE login = ? OR phone = ? OR email = ?");
        $stmt->bind_param("sss", $login_or_email_or_phone, $login_or_email_or_phone, $login_or_email_or_phone);
        $stmt->execute();
        $stmt->bind_result($id_user,$login,$phone,$email,$first_name,$last_name,$patronymic,$password_confirm,$id_rule);
        $stmt->store_result();
        if($stmt->num_rows>0){
            $stmt->fetch();
            if($password === $password_confirm){
                $_SESSION["id_user"]=$id_user;
                $_SESSION['login']=$login;
                $_SESSION['email']=$email;
                $_SESSION['first_name']=$first_name;
                $_SESSION['last_name']=$last_name;
                $_SESSION['patronymic']=$patronymic;
                $_SESSION['phone']=$phone;
                $_SESSION['id_rule']=$id_rule;
                header("Location: lk.php");
            }
        }
    }
    require_once "../header_and_footer/header.php";
    require_once "../header_and_footer/aside1.php";
?>
        <div>
            <div class="container">
                <img src="../media/front_pogruz3.png">
                <form action="" method="POST">
                    <h1>Вход в Аккаунт</h1>
                    <input type="text" id="login_or_email_or_phone" name="login_or_email_or_phone" placeholder="Логин или Почта или Номер телефона">
                    <input type="password" name="password" placeholder="Пароль">
                    <button>//отвечает за показывание пароля</button>
                    <input type="submit" value="Войти">
                </form>
            </div>
        </div>
<?php
    require_once "../header_and_footer/aside2.php";
    require_once "../header_and_footer/footer.php";
?>