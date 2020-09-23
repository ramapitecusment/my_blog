<footer class="footer">
	<div class="footer__content">
		<div class="container">
			<div class="footer__inner">
				<div class="footer__info">
					<div class="footer__title">
						Комплексное закрытие предприятия
					</div>
					<div class="footer__text">
						Полное прекращение существования юридического лица с сохранением легальности всей предыдущей
						деятельности.
					</div>
					<a data-fancybox data-src="#modal" href="javascript:;" class="header__btn" href="#">
						Добавить статью
					</a>
					<ul class="footer__list">
						<li><a class="footer__phone" href="tel:380963092145">+38 (096) 309 21 45</a></li>
						<li><a href="#">layout585@gmail.com</a></li>
						<li><a class="footer__adress" href="#">Киев, ул.Пушиной, 13</a></li>
					</ul>
				</div>
				<div class="footer__map">
					<iframe height="250px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2540.124391996489!2d30.364922015731644!3d50.457408279476354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4cc919501b4ef%3A0x71a476f68f4c8246!2z0YPQuy4g0KTQtdC-0LTQvtGA0Ysg0J_Rg9GI0LjQvdC-0LksIDEzLCDQmtC40LXQsiwgMDIwMDA!5e0!3m2!1sru!2sua!4v1555013165886!5m2!1sru!2sua" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
	<div class="footer__copy">
		<div class="container">
			<div class="copy__text">
				© 2019 Template by Ramirez Hunter. Все права защищены.
			</div>
		</div>
	</div>

	<div id="modal">
		<form action="file-handler.php" method="POST" enctype="multipart/form-data">
			<div class="form__box out__box">
				<form>
					<div class="form__box-inner">
						<div class="form__box-left">
							<label>
								Заголовок
								<input type="text" name = "title">
							</label>
							<label>
								Автор
								<input type="text" name = "author">
							</label>
							<label>
								Категория
								<select name = "categorie">
									<?php

									foreach ($categories as $cat) {
										?>
										<!--  -->
										<!--  -->
										<!--  -->
										<!--  -->
										<option value = "<?php echo $cat['id']; ?>"><?php echo $cat['title']; ?></option>
									<?php
									}
									?>
								</select>
							</label>
						</div>
					</div>
					<label id="msg__out" >
						Сообщение
						<textarea id="textarea__out" name = "text"></textarea>
					</label>
					<input type="file" name="upload">
					<button id="btn__out" class="default-btn" type="submit">Опубликовать статью</button>
				</form>
			</div>
		</form>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../js/jquery.fancybox.min.js"></script>
	<script src="../js/slick.min.js"></script>
	<script src="../js/jquery.formstyler.min.js"></script>
	<script src="../js/main.js"></script>
</footer>