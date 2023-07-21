<?php

require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

if (isset($_GET['id'])) {

  $article = Article::getByID($conn, $_GET['id']);

  if (!$article) {
    die("article not found");
  }

} else {
  die("id not supplied, article not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if ($article->delete($conn)) {

    Url::redirect("/admin/index.php");

  }
}

?>
<?php require '../includes/header.php'; ?>

<h2 class="delete-article-title" >Delete article</h2>

<form method="post">
  <p>Are you sure?</p>

  <button class="btn btn-dark deletion-button">Delete</button>
  <a class="btn btn-outline-dark deletion-button" role="button" href="article.php?id=<?= $article->id; ?>">Cancel</a>
</form>

<?php require '../includes/footer.php'; ?>