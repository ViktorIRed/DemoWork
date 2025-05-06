<?php
include_once("includes/database.php");
Database::connect();
$page = $_GET['page'];
$allNews = Database::getLatestNewsId();
$error = false;
$news = [];
if ($page > $allNews || $page <= 0)
    $error = true;
else
    $news = Database::getNewsById($page);
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

    <section class="container mb-3">
        <div class="pages-cont">
            <?php
            if ($error) {
                echo "<h1 class=\"fz-30 mt-3 mb-3\">Page Not Found</h1>";
            } else {
                $title = $news['title'];
                $announce = $news['announce'];
                $content = $news['content'];
                $image = $news['image'];
                $formattedDate = date('d.m.Y', strtotime($news['date']));

                echo '<div class="page-news-block">';
                echo " <h1 class=\"fz-30 mt-3 mb-3\">$title</h1>";
                echo "<span class=\"news-date mt-3 mb-3\">$formattedDate</span>";
                echo "<div class=\"news-label fz-24 mt-3 mb-3\">$announce</div>";
                echo "<div class=\"fz-24 mt-3 mb-3\">$content</div>";
                echo '<a href="index.php" class="news-btn mt-3"><- Назад к новостям</a>';
                echo '</div><div class="page-image-block">';
                echo "<img src=\"assets/images/$image\" alt=\"\">";
                echo '</div></div>';

                // echo "<h1 class=\"fz-30 mt-3 mb-3\">$title</h1>";
            
                // echo "<span class='news-date mt-3 mb-3'>" . htmlspecialchars($formattedDate) . "</span>";
            }
            ?>
            <!-- <div class="page-news-block">
                <h1 class="fz-30 mt-3 mb-3">ss</h1>
                <span class="news-date mt-3 mb-3">11.11.1111</span>
                <div class="news-label fz-24 mt-3 mb-3">
                    <p>JHGHJhjghjasdggsjadgjkasgdtyfsadht</p>
                </div>
                <div class="mt-3 mb-3">
                    <p>JHGHJhjghjasdggsjadgjkasgdtyfsadhtasjhafgsasdfasfdyatsfdasgduasdajhsd</p>
                </div>
                <a href="index.php" class="news-btn mt-3"><- Назад к новостям</a>

            </div>
            <div class="page-image-block">
                <img src="assets/images/0cdfb0183c985bea52e35b50e99f0909.jpg" alt="">
            </div> -->
        </div>



    </section>

    <div class="container mb-3">
        <hr class="mb-3">
        <span>© 2023 — 2412 «Галактический вестник»</span>
    </div>
</body>

</html>