<?php

/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

$pager->setSurroundCount(2);
?>
<?php if ($pager->hasPreviousPage()) : ?>
    <li class="page-item">
        <a class="page-link" href="<?= $pager->getFirst() ?>">Primera</a>
    </li>
    <li class="page-item">
        <a class="page-link" href="<?= $pager->getPreviousPage() ?>">Anterior</a>
    </li>
<?php endif ?>

<?php foreach ($pager->links() as $link) : ?>
    <li class="page-item">
        <a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
    </li>
<?php endforeach ?>

<?php if ($pager->hasNextPage()) : ?>
    <li class="page-item">
        <a class="page-link" href="<?= $pager->getNextPage() ?>">Siguiente</a>
    </li>
    <li class="page-item">
        <a class="page-link" href="<?= $pager->getLast() ?>">Última</a>
    </li>
<?php endif ?>