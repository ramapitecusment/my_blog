<header class="header">
	<div class="header__top">
		<div class="container">
			<div class="header__contacts">
				<a class="header__phone" href="tel:380963092145">+38 (096) 309 21 45</a>
				<a class="header__email" href="#">layout585@gmail.com</a>
				<a data-fancybox data-src="#modal" href="javascript:;" class="header__btn" href="#">Добавить статью</a>
			</div>
		</div>
	</div>
	<div class="header__content">
		<div class="container">
			<div class="header__content-inner">
				<div class="header__logo">
					<a href="../index.php">
						<img src="../img/logo.png" alt="">
					</a>
				</div>
				<nav class="menu">
					<div class="header__btn-menu">
						<span class="icon-bars"></span>
					</div>
					<ul>
						<li><a href="/">Главная</a></li>
						<li><a href="../pages/about_me.php">Обо мне</a></li>
						<li><a href="<?php echo $config['vk_url']; ?>" target="blank">Я Вконтакте</a></li>
						<li><a href="/articles.php">Статьи</a></li>
						<li><a href="#">Контакты</a></li>
					</ul>
				</nav>
			</div>

			<?php
			$categories_q = mysqli_query($connection, "SELECT * FROM `articles_categories`");
			$categories = array();

			while ($cat = mysqli_fetch_assoc($categories_q)) {
				$categories[] = $cat;
			}
			?>

			<section class="categories">
				<nav class="menu1">
					<div class="header__btn-categories">
						<span class="icon-bars"></span>
					</div>
					<ul style="text-align:center;">

						<?php
						foreach ($categories as $cat) {
							if ($cat['id'] == 7) continue;
							else { ?>
								<li><a href="/articles.php?categorie=<?php echo $cat['id']; ?>">
									<?php echo $cat['title'];
							} ?>
									</a></li>
						<?php } ?>
						
							<li><a href="/articles.php?categorie=7">Разное</a></li>
					</ul>
				</nav>
			</section>
		</div>
	</div>
</header>