<?php
    require_once "../header_and_footer/header.php";
    require_once "../header_and_footer/aside1.php";
?>
        <div>
            <h1>Админ панель</h1>
            <div class="container">
                <h2>Аккаунты</h2>
                //меню выбора действия над аккаунтами(редактирование, создание, выдача прав, и удаление) так же их отображение
            </div>
            <div class="container">
                <h2>Отзывы</h2>
                //осмотр одобрение и удаление не провериных отзывов, и просмотр провереных
            </div>
            <div class="container">
                <h2>Аренды</h2>
                //осмотр всех заказов и возможность отменить аренду с указаной причиной
            </div>
            <div class="container">
                <h2>Техника</h2>
                //осмотр добавление, редактирование и удаление спец техники
            </div>
        </div>
<?php
    require_once "../header_and_footer/aside2.php";
    require_once "../header_and_footer/footer.php";
?>