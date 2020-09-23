<?php
require "../includes/config.php";
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
    include('../header.php');
    ?>

    <section class="article">
        <div class="container">
            <div class="article__box-inner">
                <div class="title__and__views">
                    <div class="article__box-title">Обо мне</div>
                </div>
                <div class="article__box-image"></div>
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
    include('../footer.php');
    ?>
</body>

</html>