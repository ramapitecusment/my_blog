<?php
require "includes/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $config['title']; ?></title>
    <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,700|Roboto:400,500&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../css/slick.css">
    <link rel="stylesheet" href="../css/jquery.formstyler.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/articles.css">
    <link rel="stylesheet" href="../css/media.css">
</head>

<body>

    <?php
    include('header.php');
    ?>

    <section class="articles">

        <div class="container">
            <?php

            if (!isset($_GET['categorie'])) {

                $page = isset($_GET["page"]) ? $_GET["page"] : 1;
                $pageSize = 5;
                $fromLimit = ($page - 1) * $pageSize;
                $querry = "SELECT * FROM `articles` ";
                $articles = mysqli_query($connection, $querry . "LIMIT $fromLimit, $pageSize");
                $numArticles = mysqli_num_rows(mysqli_query($connection, $querry));
                //echo $numResults;

                while ($article = mysqli_fetch_assoc($articles)) {
                    ?>

                    <div class='articles_box-item'>
                        <div class='article_box_item-title'><a href="/article.php/?id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></div>
                        <div class='article_box_item-date'><?php echo $article['pubdate']; ?></div>
                        <div class='article_box_item-text'><?php echo mb_substr($article['text'], 0, 650, 'utf-8') . '...'; ?></div>
                    </div>

                <?php
                    }
                    ?>

                <div class="paginationContainer">

                    <div class="pageButtons">

                        <?php

                            $pagesToShow = 10;
                            $numPages = ceil($numArticles / $pageSize);
                            $pagesLeft = min($pagesToShow, $numPages);

                            $currentPage = $page - floor($pagesToShow / 2);

                            if ($currentPage < 1) {
                                $currentPage = 1;
                            }

                            if ($currentPage + $pagesLeft > $numPages + 1) {
                                $currentPage = $numPages + 1 - $pagesLeft;
                            }

                            while ($pagesLeft != 0 && $currentPage <= $numPages) {

                                if ($currentPage == $page) {
                                    echo "<div class='pageNumberContainer'>
                                                    <span class='pageNumber'>$currentPage&nbsp;&nbsp;</span>
                                                </div>";
                                } else {
                                    echo "<div class='pageNumberContainer'>
                                                        <a href='articles.php?page=$currentPage'>
                                                            <span class='pageNumber'>$currentPage&nbsp;&nbsp;</span>
                                                        </a> 
                                                </div>";
                                }

                                $currentPage++;
                                $pagesLeft--;
                            }?>
                    </div>
                </div>

            <?php
            } else {
                $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id` = " . (int) $_GET['categorie']);

                ?>

                <div class="articles_box-inner">

                    <?php
                        if (mysqli_num_rows($articles) <= 0) {
                            echo "<div class='articles_box-item'>
                            <div class='articles_box-title'>Статей по выбранной 
                            категории не обнаружено. Станьте первым, кто добавит статиью.</div>
                            </div>";
                        } else {
                            while ($article = mysqli_fetch_assoc($articles)) {
                                ?>

                            <div class='articles_box-item'>
                                <div class='article_box_item-title'><a href="/article.php/?id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></div>
                                <div class='article_box_item-date'><?php echo $article['pubdate']; ?></div>
                                <div class='article_box_item-text'><?php echo mb_substr($article['text'], 0, 650, 'utf-8') . '...'; ?></div>
                            </div>
                <?php
                        }
                    }
                }
                ?>

                </div>
        </div>

    </section>

    <?php
    include('footer.php');
    ?>

</body>

</html>