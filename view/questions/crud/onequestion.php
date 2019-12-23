<?php

namespace Anax\View;

/**
 * View to display all books.
 */
// Show all incoming variables/functions
//var_dump(get_defined_functions());
//echo showEnvironment(get_defined_vars());

// Gather incoming variables and use default values if not set
$items = isset($items) ? $items : null;

$answers = isset($answers) ? $answers : null;

// var_dump($items);
// var_dump($answers);

// Create urls for navigation
$urlToCreate = url("book/create");
$urlToDelete = url("book/delete");



?><h1>Hej</h1>

<p>
    <a href="<?= $urlToCreate ?>">Create</a> |
    <a href="<?= $urlToDelete ?>">Delete</a>
</p>

<?php if (!$items) : ?>
    <p>There are no books to show.</p>
    <?php
    return;
endif;
?>

<!-- <table> -->

    <!-- <tr> -->
        <p><?= $items->created ?> <?= $items->nick ?></p>
    <!-- </tr> -->

    <!-- <tr> -->
        <p><?= $items->text ?></p>
    <!-- </tr> -->
    <h3>Svar</h3>

<?php foreach ($answers as $answer) : ?>

    <p><?= $answer->created ?> <?= $answer->nick ?></p>

    <p><?= $answer->text ?></p>

<?php endforeach; ?>

<!-- </table> -->
