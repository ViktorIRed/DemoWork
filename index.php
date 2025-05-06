<?php
include_once("includes/database.php");
Database::connect();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галактический вестник</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <header>
            <img src="assets/images/image.png" alt="" width="64" height="64">
            <h3 class="header-text">Галактический вестник</h3>
        </header>
    </div>


    <section class="section-one mb-2">
        <div class="content">
            <p class="s1-main-text">Возвращение этнографа</p>
            <span class="s1-desc-text">Сегодня с Проксимы вернулась этнографическая экспедиция Джона Голдрама.</span>
        </div>
    </section>

    <section class="container mb-3">
        <h1 class="fz-64 mt-3 mb-3">Новости</h1>
        <div class="news mb-3">
            <?php
            $resultNews = Database::getAllNews();
            $newsCount = 0;
            while ($row = mysqli_fetch_assoc($resultNews)) {
                $newsCount++;
                $pageNum = $row['id'];
                $formattedDate = date('d.m.Y', strtotime($row['date']));
                echo "<div class='news-block'>";
                echo "<span class='news-date mb-3'>" . htmlspecialchars($formattedDate) . "</span>";
                echo "<span class='news-label fz-30 mb-3'>" . htmlspecialchars($row['title']) . "</span>";
                echo $row['announce'];
                echo "<a href='pages.php?page=$pageNum' class='news-btn mt-3'>Подробнее -></a>";
                echo "</div>";
            }
            ?>
            <!-- <div class="news-block">
                <span class="news-date mb-3">11.05.2020</span>
                <span class="news-label fz-30 mb-3">Возвращение этнографа</span>
                <span class="news-desc mb-3">Сегодня с Проксимы вернулась этнографическая экспедиция Джона
                    Голдрама.</span>
                <button class="news-btn mt-3">Подробнее -></button>
            </div>

            <div class="news-block">
                <span class="news-date mb-3">11.05.2020</span>
                <span class="news-label fz-30 mb-3">Возвращение этнографа</span>
                <span class="news-desc mb-3">Сегодня с Проксимы вернулась этнографическая экспедиция Джона
                    Голдрама.</span>
                <button class="news-btn">Подробнее -></button>
            </div>

            <div class="news-block">
                <span class="news-date mb-3">11.05.2020</span>
                <span class="news-label fz-30 mb-3">Возвращение этнографа</span>
                <span class="news-desc mb-3">Сегодня с Проксимы вернулась этнографическая экспедиция Джона
                    Голдрама.</span>
                <button class="news-btn">Подробнее -></button>
            </div>

            <div class="news-block">
                <span class="news-date mb-3">11.05.2020</span>
                <span class="news-label fz-30 mb-3">Возвращение этнографа</span>
                <span class="news-desc mb-3">Сегодня с Проксимы вернулась этнографическая экспедиция Джона
                    Голдрама.</span>
                <button class="news-btn">Подробнее -></button>
            </div>

            <div class="news-block">
                <span class="news-date mb-3">11.05.2020</span>
                <span class="news-label fz-30 mb-3">Возвращение этнографа</span>
                <span class="news-desc mb-3">Сегодня с Проксимы вернулась этнографическая экспедиция Джона
                    Голдрама.</span>
                <button class="news-btn">Подробнее -></button>
            </div>

            <div class="news-block">
                <span class="news-date mb-3">11.05.2020</span>
                <span class="news-label fz-30 mb-3">Возвращение этнографа</span>
                <span class="news-desc mb-3">Сегодня с Проксимы вернулась этнографическая экспедиция Джона
                    Голдрама.</span>
                <button class="news-btn">Подробнее -></button>
            </div>

            <div class="news-block">
                <span class="news-date mb-3">11.05.2020</span>
                <span class="news-label fz-30 mb-3">Возвращение этнографа</span>
                <span class="news-desc mb-3">Сегодня с Проксимы вернулась этнографическая экспедиция Джона
                    Голдрама.</span>
                <button class="news-btn">Подробнее -></button>
            </div>

            <div class="news-block">
                <span class="news-date mb-3">11.05.2020</span>
                <span class="news-label fz-30 mb-3">Возвращение этнографа</span>
                <span class="news-desc mb-3">Сегодня с Проксимы вернулась этнографическая экспедиция Джона
                    Голдрама.</span>
                <button class="news-btn">Подробнее -></button>
            </div> -->
        </div>
        <?php
        echo '<div class="pagination"><ul>';
        $countPage = ceil($newsCount / 4);
        for($i = 1; $i <= $countPage; $i++) {
            echo "<li>
                    <button class=\"news-btn-page\">$i</button>
                </li>";
        }
        echo '<li class="news-latest-button"><button>-></button></li>';
        echo '</ul></div>';
        ?>
        <!-- <div class="pagination">
            <ul>
                <li>
                    <button class="news-btn-page">1</button>
                </li>
                <li>
                    <button class="news-btn-page">2</button>
                </li>
                <li>
                    <button class="news-btn-page">3</button>
                </li>
                <li class="news-latest-button">
                    <button>-></button>
                </li>
            </ul>
        </div> -->
    </section>

    <div class="container mb-3">
        <hr class="mb-3">
        <span>© 2023 — 2412 «Галактический вестник»</span>
    </div>


    <script src="assets/js/app.js"></script>
</body>

</html>