<?php
    require_once "../header_and_footer/header.php";
    require_once "../header_and_footer/aside1.php";
?>
        <div>
            <div class="container">
                <div>
                    <form class="filter" action="" method="POST">
                        <select id="tech" name="Тип СпецТехники">
                            <option value="">Все</option>
                            <option value="1">Гусеничные экскаваторы</option>
                            <option value="2">Колесные экскаваторы</option>
                            <option value="3">Мини экскаваторы</option>
                            <option value="4">Экскаваторы-погрузчики</option>
                        </select>
                        <input type="text" placeholder="Цена за час ___ Рублей">
                        <input type="submit" value="Найти">
                    </form>
                    <div>
                        <?php
                            require_once "../code/all.php";
                            if($_SERVER["REQUEST_METHOD"]==="POST"){
                            $itemsPerPage=12;
                            $itemsStartPage=$itemsPerPage*$_SESSION['Page']-($itemsPerPage-1);
                            $itemsEndPage=$itemsPerPage*$_SESSION['Page'];
                            $stmt = $connect->prepare("SELECT id_product, name_product, photo, price, available FROM Products WHERE id_type = ?");
                            $stmt->bind_param("s", $id_type);
                            $stmt->execute();
                            $stmt->bind_result($id_product,$name_product,$photo,$price,$available);
                            if (!isset($_SESSION['Page'])) {
                            $_SESSION['Page'] = 1;
                            }
                            for ($i = $itemsStartIndex; $i <= $itemsEndIndex; $i++) {
                                if (isset($products[$i])) {
                                $product = $products[$i];
                                echo    "<article>
                                            <h2>{$product['name_product']}</h2>
                                            <img src='{$product['photo']}'>
                                            <div>
                                                <p>{$product['price']}</p>
                                                <p>{$product['available']}</p>
                                            </div>
                                            <button>Арендовать</button>
                                        </article>";
                                    }
                                }
                            }
                        ?>
                        <form action="" method="POST">
                            <button type="submit" name="page" value="1">В начало</button>
                            <button type="submit" name="page" value="<?=$_SESSION['Page']-1?>">Предыдущая</button>
                            <div>
                                <input type="text" value="<?= $_SESSION['Page'] ?>">
                                <p><?= $totalPages ?></p>
                            </div>
                            <button type="submit" name="page" value="<?=$_SESSION['Page']+1?>">Следующая</button>
                            <button type="submit" name="page" value="<?= $totalPages ?>">В конец</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php
    require_once "../header_and_footer/aside2.php";
    require_once "../header_and_footer/footer.php";
?>