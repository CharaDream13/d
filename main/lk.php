<?php
    require_once "../header_and_footer/header.php";
    require_once "../header_and_footer/aside1.php";
    $stmt = $connect->prepare("SELECT login, phone, email, first_name, last_name, patronymic, password FROM Users WHERE id_user = ?");
    $stmt->bind_param("s", $_SESSION['id_user']);
    $stmt->execute();
?>
        <div>
            <div class="container">
                <div>
                    <img src="">
                    <h1>Ваши данные</h1>
                    <p><?=$_SESSION['login']?></p>
                    <p><?=$_SESSION['email']?></p>
                    <p><?=$_SESSION['first_name']?></p>
                    <p><?=$_SESSION['last_name']?></p>
                    <p><?=$_SESSION['patronymic']?></p>
                    <p><?=$_SESSION['phone']?></p>
                </div>
                <button>Выйти</button>
            </div>
            <div class="container">
                //отвечае за отображение аренд, если статус будет как закрыт должна появится возможность написать отзыв
                <div>
                    <button>В начало</button>
                    <button>//страница -2</button>
                    <button>//страница -1</button>
                    <div>
                        <input type="text">
                        <span> "/" //колво страниц</span>
                    </div>
                    <button>//страница +1</button>
                    <button>//страница +2</button>
                    <button>В конец</button>
                </div>
            </div>
        </div>
<?php
    require_once "../header_and_footer/aside2.php";
    require_once "../header_and_footer/footer.php";
?>