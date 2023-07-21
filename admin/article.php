<?php

require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

if (isset($_GET['id'])) {

    $article = Article::getWithCategories($conn, $_GET['id']);

} else {
    $article = null;
}

?>

<?php require '../includes/header.php'; ?>

<?php if ($article): ?>
    <article>
        <h2 class="article-title">
            <?= htmlspecialchars($article[0]['title']); ?>
        </h2>

        <?php if ($article[0]['published_at']): ?>
            <time class="article-date">
                <?= $article[0]['published_at'] ?>
            </time>
        <?php else: ?>
            Unpublished
        <?php endif; ?>

        <?php if ($article[0]['category_name']): ?>
            <p class="article-category">Categories:
                <?php foreach ($article as $a): ?>
                    <?= htmlspecialchars($a['category_name']); ?>
                <?php endforeach; ?>
            </p>

        <?php endif; ?>

        <?php if ($article[0]['image_file']): ?>
            <img class="article-image" src="/uploads/<?= $article[0]['image_file']; ?>">
        <?php endif; ?>
        <p>
            <?= htmlspecialchars($article[0]['content']); ?>
        </p>
    </article>
    
    <a class="btn btn-secondary btn-sm article-button" role="button" href="edit-article.php?id=<?= $article[0]['id']; ?>">Edit article</a>
    <a class="delete btn btn-outline-secondary btn-sm article-button" role="button" href="delete-article.php?id=<?= $article[0]['id']; ?>">Delete article</a>
    <a class="btn btn-secondary btn-sm article-button" role="button" href="edit-article-image.php?id=<?= $article[0]['id']; ?>">Edit image</a>

<?php else: ?>
    <p>Article not found.</p>

<?php endif; ?>

<?php require '../includes/footer.php'; ?>