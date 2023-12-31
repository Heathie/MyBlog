<?php

require 'includes/init.php';

$conn = require 'includes/db.php';

$paginator = new Paginator($_GET['page'] ?? 1, 4, Article::getTotal($conn, true));

$articles = Article::getPage($conn, $paginator->limit, $paginator->offset, true);

?>

<?php require 'includes/header.php'; ?>

<?php if (empty($articles)): ?>
    <p>No articles found.</p>
<?php else: ?>
    <ul id="index">
        <?php foreach ($articles as $article): ?>
            <li class="article-item">
                <article>
                    <h2 class="article-name"><a href="article.php?id=<?= $article['id']; ?>"><?= htmlspecialchars($article['title']); ?></a></h2>

                    <time class="article-date" datetime="<?= $article['published_at'] ?>"><?php
                      $datetime = new DateTime($article['published_at']);
                      echo $datetime->format("j F,Y");
                      ?></time>

                    <?php if ($article['category_names']): ?>
                        <p class="article-category">Categories:
                            <?php foreach ($article['category_names'] as $name): ?>

                                <?= htmlspecialchars($name || ''); ?>
                            <?php endforeach; ?>
                        </p>
                    <?php endif; ?>

                    <p>
                        <?= htmlspecialchars(substr($article['content'], 0, 300)); ?>
                        <?php if (strlen($article['content']) > 300): ?>
                            ...
                        <?php endif; ?>
                    </p>
                </article>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php require 'includes/pagination.php'; ?>

<?php endif; ?>

<?php require 'includes/footer.php'; ?>