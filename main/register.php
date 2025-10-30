<?php
    require_once "../code/all.php";
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = $_POST["login"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $patronymic = $_POST["patronymic"];
    $password = $_POST["password"];
    $password_confirm = $_POST["passwordConfirm"];
    $id_rule = 3;
    if ($password == $password_confirm) {
        $stmt = $connect->prepare("SELECT id_user FROM Users WHERE login = ? OR phone = ? OR email = ?");
        $stmt->bind_param("sss", $login, $phone, $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows === 0) {
            $stmt_insert = $connect->prepare("INSERT INTO Users(login, phone, email, password, first_name, last_name, patronymic, id_rule) VALUES (?,?,?,?,?,?,?,?)");
            $stmt_insert->bind_param('sssssssi', $login, $phone, $email, $password, $first_name, $last_name, $patronymic, $id_rule);
            $stmt_insert->execute();
            header("Location: login.php");
            exit;
            } else {
                $used = true;
            }
            $stmt->close();
        }
    }
    require_once "../header_and_footer/header.php";
    require_once "../header_and_footer/aside1.php";
?>
    <div class="container">
        <form action="" method="POST">
            <h1>Регистрация Аккаунта</h1>
            <div>
                <label for="login">Логин:</label>
                <input type="text" id="login" name="login" placeholder="Логин" pattern="^[a-zA-Z0-9-]{3,}$" required>
            </div>
            <h2>Контактные данные</h2>
            <div>
                <label for="email">Почта:</label>
                <input type="email" id="email" name="email" placeholder="Почта" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required>
            </div>
            <div>
                <label for="phone">Номер телефона:</label>
                <input type="text" id="phone" name="phone" placeholder="Номер телефона" pattern="^(8|\+7)[\s\-]?\(?\d{3}\)?[\s\-]?\d{3}[\s\-]?\d{2}[\s\-]?\d{2}$" required>
            </div>
            <div>
                <label for="first_name">Имя:</label>
                <input type="text" id="first_name" name="first_name" placeholder="Имя" pattern="^[а-яА-ЯёЁ -]+$" required>
            </div>
            <div>
                <label for="last_name">Фамилия:</label>
                <input type="text" id="last_name" name="last_name" placeholder="Фамилия" pattern="^[а-яА-ЯёЁ -]+$" required>
            </div>
            <div>
                <label for="patronymic">Отчество:</label>
                <input type="text" id="patronymic" name="patronymic" placeholder="Отчество" pattern="^[а-яА-ЯёЁ -]+$" required>
            </div>
            <h2>Пароль</h2>
            <div>
                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" placeholder="Пароль" pattern="^[a-zA-Z0-9-]{6,}$" required>
                <button id="togglePassword">//отвечает за показывание пароля</button>
            </div>
            <div>
                <label for="passwordConfirm">Повторите пароль:</label>
                <input type="password" id="passwordConfirm" name="passwordConfirm" placeholder="Повторите пароль" pattern="^[a-zA-Z0-9-]{6,}$" required>
            </div>
            <input type="submit" value="Зарегистрироваться">
            <p><?= $register_error ?></p>
        </form>
        <img src="../media/koles_2.png">
    </div>
<?php
    require_once "../header_and_footer/aside2.php";
    require_once "../header_and_footer/footer.php";
?>
<script>
    const password = document.getElementById('password');
    const passwordConfirm = document.getElementById('passwordConfirm');
    const used = dataElem.getAttribute('used') === '1';
    if (used) {
        loginInput.setCustomValidity('Этот Логин почта или номер телефона уже занят');
        emailInput.setCustomValidity('Этот Логин почта или номер телефона уже занят');
        phoneInput.setCustomValidity('Этот Логин почта или номер телефона уже занят');
    }

    function validatePassword() {
        passwordConfirm.setCustomValidity('');
        if (password.value !== passwordConfirm.value) {
            passwordConfirm.setCustomValidity('Пароли не совпадают!');
        }
    }
 
    password.oninput = validatePassword;
    passwordConfirm.oninput = validatePassword;
</script>