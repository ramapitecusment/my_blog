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
	<link rel="stylesheet" href="../css/article.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/media.css">
</head>

<body>

	<?php
	include('header.php');
	?>

	<?php
	$news_slide = mysqli_query($connection, "SELECT * FROM `articles` LIMIT 4 ");
	?>



	<section class="slider">
		<div class="container">
			<div class="slider__inner">
				<?php
				$i = 0;
				while ($art = mysqli_fetch_assoc($news_slide)) {
					?>
					<div class="slider__item">
						<div class="slider__item-content">
							<div class="slider__title">
								<?php echo $art['title']; ?>
							</div>
							<div class="slider__text">
								<?php echo mb_substr($art['text'], 0, 150, 'utf-8') . '...'; ?>
							</div>
							<a href="/article.php/?id=<?php echo $art['id']; ?>" class="default-btn">
								Перейти к статье
							</a>
						</div>
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</section>

	<?php
	$top_news = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 3");
	?>


	<section class="services">
		<div class="container">
			<div class="services__top">
				<div class="services__title-box">
					<div class="services__title">
						Топ лучших статей за все время
					</div>
					<div class="services__text">
						Комплексный подход к вашему вопросу, своевременная правовую помощь, представление интересов во
						всех судебных
						инстанциях.
					</div>
				</div>
				<div class="services__btn">
					<a href="/articles.php">
						Показать все статьи
					</a>
				</div>
			</div>
			<div class="services__items">
				<?php
				$i = 0;
				while ($art = mysqli_fetch_assoc($top_news)) {
					?>
					<div class="services__item">
						<img src="../img/about-1.png" alt="">
						<div class="services__item-title">
							<?php echo $art['title']; ?>
						</div>
						<div class="services__item-text">
							<?php echo mb_substr($art['text'], 0, 250, 'utf-8') . '...'; ?>
						</div>
						<div class="services__item-btn">
							<a class="services__item-link"><?php echo $art['views']; ?></a>
							<a href="/article.php/?id=<?php echo $art['id']; ?>" class="default-btn">
								Перейти к статье
							</a>
						</div>
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</section>

	<section class="about">
		<div class="container">
			<div class="about__inner">
				<div class="about__title">
					О компании
				</div>
				<div class="about__text">
					Компания специализируется на оказании услуг в сфере корпоративного права, налогового консалтинга,
					представительства в судах, ликвидации и банкротства предприятий. На сегодняшний день, коллектив
					компании
					объединяет
					высокопрофессиональных экспертов имеющих
					специализации в отдельных областях права.
				</div>
				<a href="#" class="about__btn default-btn">
					Узнать больше
				</a>
			</div>
		</div>
	</section>

	<section class="form">
		<div class="container">
			<div class="form__inner">
				<div class="form__content">
					<div class="form__title-box">
						<div class="form__title">
							Опубликовать статью
						</div>
						<div class="form__text">
							С помощью данного блока вы можете делиться новостями с другими
							пользователями.
						</div>
					</div>
					<div class="form__box">
						<form action="file-handler.php" method="POST" enctype="multipart/form-data">
							<div class="form__box-inner">
								<div class="form__box-left">
									<label>
										Заголовок
										<input type="text" name="title">
									</label>
									<label>
										Автор
										<input type="text" name="author">
									</label>
									<label>
										Тема вопроса
										<select name="categorie">
											<?php

											foreach ($categories as $cat) {
												?>
												<!--  -->
												<!--  -->
												<!--  -->
												<!--  -->
												<option value="<?php echo $cat['id']; ?>"><?php echo $cat['title']; ?></option>
											<?php
											}
											?>
										</select>
									</label>
								</div>
								<div class="form__box-right">
									<label>
										Сообщение
										<textarea name="text"></textarea>
									</label>
									<input type="file" name="upload">
									<button class="default-btn" type="submit">Опубликовать статью</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- <section class="advantages">
		<div class="container">
			<div class="about__title">
				Лучшие авторы сайта
			</div>
			<div class="advantages__inner">
				<div class="advantages-item">
					<div class="advantages__title">
						Первое место
					</div>
					<div class="advantages__text">
						автор
					</div>
				</div>
				<div class="advantages-item">
					<div class="advantages__title">
						Второе место
					</div>
					<div class="advantages__text">
						Автор
					</div>
				</div>
				<div class="advantages-item">
					<div class="advantages__title">
						Третье место
					</div>
					<div class="advantages__text">
						Автор
					</div>
				</div>
			</div>
		</div>
	</section> -->

	<section class="news">
		<div class="container">
			<div class="news__top">
				<div class="news__title-box">
					<div class="news__title">
						Новые статьи
					</div>
					<div class="news__text">
						В данном разделе вы можете ознакомиться с самыми
						актуальными новостями на нашем блоге.
					</div>
				</div>
				<div class="news__btn">
					<a href="/article.php">
						Открыть все новости
					</a>
				</div>
			</div>

			<?php
			$news = mysqli_query($connection, "SELECT * FROM `articles` LIMIT 4 ");
			?>

			<div class="news__inner">
				<div class="news__slider">
					<div class="news__slider-inner">
						<?php
						$i = 0;
						while ($art = mysqli_fetch_assoc($news)) {
							?>

							<div class="news__slider-item">
								<div class="news__slider-title">
									<?php echo $art['title']; ?>
								</div>
								<div class="news__slider-text">
									<?php echo mb_substr($art['text'], 0, 650, 'utf-8') . '...'; ?>
								</div>
								<div class="news__slider-author">
									<?php echo $art['authors']; ?>
								</div>
							</div>

						<?php
						}?>
					</div>
				</div>

				<?php
				$news_with_img = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 2");

				$i = 0;
				while ($art = mysqli_fetch_assoc($news_with_img)) {
					?>
					<a href="/article.php/?id=<?php echo $art['id']; ?>" class="news__blog">
						<div class="news__images">
							<img src="/static/images/<?php echo $art['image']; ?>" alt="">
							<div class="news__date">03.04</div>
						</div>
						<div class="news__blog-title">
							<?php echo $art['title']; ?>
						</div>
						<div class="news__blog-text">
							<?php echo mb_substr($art['text'], 0, 150, 'utf-8') . '...'; ?>
						</div>
					</a>

				<?php } ?>
			</div>
		</div>
	</section>

	<?php
	include('footer.php');
	?>

</body>

</html>