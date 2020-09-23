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
    <link rel="stylesheet" href="../css/article.css">
    <link rel="stylesheet" href="../css/media.css">
</head>

<body>

    <?php
    include('header.php');
    ?>


    <?php

    $article = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id']);

    if (mysqli_num_rows($article) <= 0) {
        ?>
        <section class="article">
            <div class="container">
                <div class="article__box-inner">
                    <div class="title__and__views">
                        <div class="article__box-title">Статья не найдена</div>
                        <p class="article__views">0 просмотров</p>
                    </div>
                    <div class="article__date">00.00.0000</div>
                    <!-- <div class="article__box-image"></div> -->
                    <div class="article__box-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit soluta facilis magni officiis. Dicta recusandae provident delectus illum ipsum facere eius ipsa corporis nisi sint velit amet, vero, esse molestiae.
                        Quisquam distinctio ipsam non rem beatae deserunt sequi, consectetur dolor ducimus quis soluta voluptates nobis fuga, mollitia porro inventore, sed velit quam doloribus impedit dolorem voluptatum! Architecto nemo quis voluptatum.
                        Mollitia a culpa fugit, dolores laudantium perferendis ea veritatis, nisi expedita odit rem placeat nesciunt eaque, laborum saepe? Deleniti rerum mollitia iste tenetur, provident error officia aperiam unde ea accusamus?
                        Voluptate illum cupiditate totam fugiat quia. Accusantium, labore beatae, tempore, laborum vitae et inventore quasi voluptatum necessitatibus cumque totam sit corporis dignissimos perferendis! Perferendis, quidem eos nesciunt earum suscipit tenetur!
                        Quisquam totam error voluptas sed ea eligendi ad culpa velit porro delectus nisi consequuntur possimus molestiae voluptatibus magnam assumenda, praesentium ipsam officia pariatur ex quas beatae fugiat vero. Consequuntur, possimus?
                        Illo quos, sequi accusantium facilis suscipit eligendi modi atque, debitis consequatur sapiente dignissimos voluptatem ea laudantium? Animi voluptatibus voluptas repudiandae dicta error, id ratione dolore minima quaerat aut placeat deleniti!
                        Omnis perspiciatis iste facilis fuga error distinctio unde, temporibus qui nemo quas veritatis non quod dicta incidunt doloremque obcaecati ducimus hic repudiandae molestias. Ipsam saepe delectus rem optio quia in!</div>
                    <div class="article__box-author">Стив Жобс</div>
                </div>
            </div>
        </section>
    <?php
    } else {

        $art = mysqli_fetch_assoc($article);
        mysqli_query($connection, "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = " . (int) $art['id'])

        ?>

        <section class="article">
            <div class="container">
                <div class="article__box-inner">
                    <div class="title__and__views">
                        <div class="article__box-title"><?php echo $art['title']; ?></div>
                        <p class="article__views"><?php echo $art['views']; ?> просмотров</p>
                    </div>
                    <div class="article__date"><?php echo $art['pubdate']; ?></div>
                    <div class="article__box-image">
                        <img src="/static/images/<?php echo $art['image']; ?>" alt="" style="max-width: 100%;">
                    </div>
                    <div class="article__box-text"><?php echo $art['text']; ?></div>
                    <div class="article__box-author"><?php echo $art['authors']; ?></div>
                </div>
            </div>
        </section>

        <section class="comments">
            <div class="container">
                <div class="comments__box-inner">
                    <div class="title">

                        <?php

                            $limit = 2;
                            $page = $_POST['page'];
                            if (($page == '')) {
                                $page = 1;
                            }

                            $query = "SELECT * FROM `comments` WHERE `articles_id` = " . (int) $art['id'] . " ORDER BY `id` DESC";

                            $total_posts = mysqli_num_rows(mysqli_query($connection, $query));
                            $total_pages = ceil($total_posts / $limit);
                            $start = ($page - 1) * $limit;

                            $comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `articles_id` = "
                                . (int) $art['id'] . " ORDER BY `id` DESC LIMIT $start,$limit");

                            if (mysqli_num_rows($comments) <= 0) {
                                echo "<div class='comments__box-title'>\nКомментариев нет. Добавьте :)</div>";
                            } else {
                                echo "<div class=\"comments__box-title\">Комментарии</div>";
                                while ($comment = mysqli_fetch_assoc($comments)) {
                                    ?>

                    </div>
                    <div class="comments__container">

                        <div class="comments__container-item">
                            <div class="comments__conteainer-inner">
                                <div class="photos">
                                    <img src="../img/anonim.png" alt="">
                                </div>
                                <div class="comment__container-text">
                                    <div class="comments__box-author"><?php echo 'Имя: ' . $comment['author']; ?></div>
                                    <div class="comments__box-author"><?php echo " Ник: " . $comment['nickname']; ?></div>
                                    <div class="comments__box-time"><?php echo $comment['pubdate'] ?></div>
                                    <div class="comments__box-text"><?php echo $comment['text'] ?></div>
                                </div>
                            </div>
                        </div>
                <?php
                        }
                    }
                    ?>
                <form action="" method="POST">
                    <?php
                        $i = 1;
                        while ($i <= $total_pages) {
                            ?>
                        <input type="submit" class="form__control" name="page" value="<?php echo "$i"; ?>">
                    <?php
                            $i++;
                        } ?>
                </form>
                    </div>
                </div>

            </div>
        </section>

        <section class="paggination">
            <div class="container">

            </div>
        </section>

        <section id='comment_yacor' class="add__comment">
            <div class="container">
                <div class="add__comment-inner">
                    <div class="block" id="comment-add-form">
                        <h3>Добавить комментарий</h3>
                        <div class="block__content">
                            <form class="form" method="POST" action="/article.php?id=<?php echo $art['id'] ?>">
                                <?php
                                    if (isset($_POST['do_post'])) {
                                        $errors = array();

                                        if ($_POST['name'] == '') {
                                            $errors[] = 'Введите имя!';
                                        }
                                        if ($_POST['nickname'] == '') {
                                            $errors[] = 'Введите ник!';
                                        }
                                        if ($_POST['text'] == '') {
                                            $errors[] = 'Введите текст комментария!';
                                        }

                                        if (empty($errors)) {

                                            // echo "INSERT INTO `comments` (`author`, `nickname`, `text`, `pubdate`, `articles_id`) 
                                            // VALUES ('" . $_POST['name'] . "', '" . $_POST['nickname'] . "', '" . $_POST['text'] . "',  NOW() , '" .  $art['id'] . "')";
                                            // exit();

                                            mysqli_query($connection, "INSERT INTO `comments` (`author`, `nickname`, `text`, `pubdate`, `articles_id`) 
                                            VALUES ('" . $_POST['name'] . "', '" . $_POST['nickname'] . "', '" . $_POST['text'] . "',  NOW() , '" .  $art['id'] . "')");
                                        } else {
                                            echo '<span style = "color: red; font-weight: bold;
                                            margin-bottom: 10px;">' . $errors['0'] . '<hr>' . '</span>';
                                        }
                                    }

                                    ?>
                                <div class="form__group">
                                    <div class="comment__row">
                                        <div class="comment__name">
                                            <input type="text" class="form__control" required="" name="name" placeholder="Имя">
                                        </div>
                                        <div class="comment__nickname">
                                            <input type="text" class="form__control" required="" name="nickname" placeholder="Никнейм">
                                        </div>
                                    </div>
                                </div>
                                <div class="form__group">
                                    <textarea name="text" required="" class="form__control" placeholder="Текст комментария ..."></textarea>
                                </div>
                                <div class="form__group">
                                    <input type="submit" class="form__control" name="do_post" value="Добавить комментарий">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php
    }
    ?>

    <?php
    include('footer.php');
    ?>

</body>

</html>