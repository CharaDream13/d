<?php
    require_once "../header_and_footer/header.php";
    require_once "../header_and_footer/aside1.php";
?>
        <div>
            <div class="container">
                <img src="">
                <form>
                    <h1><?= //название техники ?></h1>
                    <p><?= //описание техники ?></p>
                    <p>//описание скидки</p>
                    <input type="text" placeholder="Цена за час: <?= //стоимость техники ?>">
                    <input type="text" placeholder="Укажите дату аренды">
                    <p><?= //количество техники на данный момент ?></p>
                    <h2>Итоговая стоимость <?= //Итоговая стоимость техники ?></h2>
                    <p>//надпись вам положена скидка в зависимости от количество часов</p>
                    <input type="submit" value="Арендовать">
                    <?php
                    //если аккаунта нет переводит на страницу аккаунта если есть арендовывается
                    ?>
                </form>
            </div>
        </div>
<?php
    require_once "../header_and_footer/aside2.php";
    require_once "../header_and_footer/footer.php";
?>