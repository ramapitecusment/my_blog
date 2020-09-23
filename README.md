# My Blog

### Aims and golas

This website is created as my test IT-blog in order to enhance my frontend and backend skills.

The goal of the project is to create the following functionality:

1. Adding articles;
2. Display random articles;
3. Display the most visited articles;
4. Display the most recent articles;
5. Dynamic category updates;
6. Display all articles and by category;
7. Adding comments;
8. Adding images to the server;
9. The system of pagination (pagination system).

### Database

A Database with three tables was created for this project: articles, articles_categories, and comments.

![alt text](https://raw.githubusercontent.com/ramapitecusment/my_blog/master/images_git/1.png)

The ”articles“ table contains such columns as: ”id“, ”authors“, ”title“, ”text“ ,”categorie_id“,
 ”pubdate“, ”views“, ”image“. It stores all articles written by different authors on different 
topics, which are divided into different categories. For more convenience, categories are 
accessed by their ID, namely "categorie_id".

![alt text](https://raw.githubusercontent.com/ramapitecusment/my_blog/master/images_git/2.png)

The "comments“ table contains all the comments that were written for certain articles. 
This table contains the following columns: “id”, “author”, “nickname”, “pubdate”, “text”, 
“articles_id".

![alt text](https://raw.githubusercontent.com/ramapitecusment/my_blog/master/images_git/3.png)

On the site, all categories are displayed in the "header", that is, at the top of the page. 
header.php is responsible for this. Moreover, the category "Разное" has an ID equal to 7, 
and PHP equal to 8, but nevertheless, "Разное" is displayed later, so that the user 
can more easily navigate the site.

![alt text](https://raw.githubusercontent.com/ramapitecusment/my_blog/master/images_git/3_1.png)

### Querry execution

The mysqli_query(), mysqli_real_query (), and mysqli_multi_query () functions are responsible for 
executing queries. The mysql_query () function is most often used, since it performs two tasks at 
once: it executes a request and buffers the result of this request on the client 
(if there is one). Calling mysql_query() is identical to calling mysqli_real_query() 
and mysql_store_result () sequentially.

Responsive design helps you avoid breaking the site's integrity when adding new categories. 
This result was obtained by creating a query to the Database and creating a loop that 
allows you to dynamically create different categories on the site.

```
<?php
foreach ($categories as $cat) {
	if ($cat['id'] == 7) continue;
	else { ?>
		<li><a href="/articles.php?categorie=<?php echo $cat['id']; ?>">
			<?php echo $cat['title'];
	} ?>
			</a></li>
<?php } ?>
```

When you click on one of the categories, the user will be redirected to a page with all 
the news or articles on this topic. In “articles.php” there is a GET request that 
intercepts the category id and, according to this category, displays the corresponding news and so on.

![alt text](https://raw.githubusercontent.com/ramapitecusment/my_blog/master/images_git/4.png)

If there are no articles for the selected category yet, the following result will be displayed:

![alt text](https://raw.githubusercontent.com/ramapitecusment/my_blog/master/images_git/4_1.png)

The "while" loop is used here to output the query results. For the" while" loop, we need to know 
how many rows are received in the "$articles" variable. The mysql_num_rows() function is used for this purpose.

To make it more convenient for the user, you can view the oldest articles, the newest articles, 
and the most visited articles on the main page.

To display the oldest articles, it is best to sort them by their "ID". To do this, create a query 
in the Database, where we take only 4 articles. By default, the new articles have the highest ID, 
so there is no need to apply complicated sorting parameters.

**mysqli_fetch_assoc** — Retrieves the resulting series as an associative array

```
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
```

![alt text](https://raw.githubusercontent.com/ramapitecusment/my_blog/master/images_git/4_2.png)

To display the most visited articles, you need to create a query in the database, where we sort 
by the number of visits, in descending order, and limit the number of results to 3. As a result,
 we will get the 3 most visited articles in the blog.

```
<?php
	$top_news = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 3");
?>
```

![alt text](https://raw.githubusercontent.com/ramapitecusment/my_blog/master/images_git/5.png)

In order to sort articles by the newest ones, you need to add “ODRER BY ID” in the query 
parameters and add “DESC” so that sorting is performed by kill. Also, the site only 
needed to add the 2 newest articles.

```
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

<?php} ?>
```

![alt text](https://raw.githubusercontent.com/ramapitecusment/my_blog/master/images_git/6.png)

### Adding new articles to the IT-blog
This form accepts the following parameters: Title, Author, Category, article text, Image. 
<input type="file" name="upload"> is responsible for uploading images. You can "capture" a file 
using $_FILES['upload']['tmp_name'];

To upload an image from the user's computer, use the “HTML-form” to send the file to the “PHP-script” 
using the “POST” method and specify the data encoding method “enctype="multipart/form-data"” 
(in this case, the data is not encoded and this value is only used for sending binary files).

For the file selection field, we use the name “name="upload"” in our “HTML-form”,  although it can be anything. 
After sending the file to the handler.php “PHP-script” it can be intercepted using the superglobal variable 
“$_FILES['upload']” with the same name, which contains information about the file in the array.

Not all data from "$_FILES "can be trusted: the "MIME-type” and file size can be forged, because 
they are formed from the “HTTP response”, and the extension in the file name should not be trusted 
due to the fact that it may hide a completely different file. However, next we need to check whether 
our file loaded correctly and whether it loaded at all. To do this, check the errors in” 
$_FILES['upload']['error'] “and make sure that the file was uploaded using the POST method 
using the” is_uploaded_file () " function. If something goes wrong, then we display the error on the screen.

```
if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($filePath)) {

    // Массив с названиями ошибок
    $errorMessages = [
        UPLOAD_ERR_INI_SIZE   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
        UPLOAD_ERR_FORM_SIZE  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
        UPLOAD_ERR_PARTIAL    => 'Загружаемый файл был получен только частично.',
        UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
        UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
        UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
        UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.',
    ];

    // Зададим неизвестную ошибку
    $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';

    // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
    $outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;

    // Выведем название ошибки
    die($outputMessage);
}
```

The result if the user try to upload python script, .pdf, .docx file as an image

![alt text](https://raw.githubusercontent.com/ramapitecusment/my_blog/master/images_git/7.png)

Moreover, users can leave comments and when the open an article the number of view will increase.

```
mysqli_query($connection, "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = " . (int) $art['id'])


mysqli_query($connection, "INSERT INTO `comments` (`author`, `nickname`, `text`, `pubdate`, `articles_id`) 
VALUES ('" . $_POST['name'] . "', '" . $_POST['nickname'] . "', '" . $_POST['text'] . "',  NOW() , '" .  $art['id'] . "')");
```