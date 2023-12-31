<?php $base = strtok($_SERVER["REQUEST_URI"], '?'); ?>

<nav>
    <ul class="pagination justify-content-center pagination-button">
        <li class="page-item">
            <?php if ($paginator->previous): ?>
                <a class="page-link" href="<?= $base; ?>?page=<?= $paginator->previous; ?>">Previous</a>
            <?php else: ?>
                <span class="page-link disabled">Previous</span>
            <?php endif; ?>
        </li>
        <li class="page-item">
            <?php if ($paginator->next): ?>
                <a class="page-link" href="<?= $base; ?>?page=<?= $paginator->next; ?>">Next</a>
            <?php else: ?>
                <span class="page-link disabled">Next</span>
            <?php endif; ?>
        </li>
    </ul>
</nav>
