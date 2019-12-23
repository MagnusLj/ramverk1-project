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

$answercomments = isset($answercomments) ? $answercomments : null;

// var_dump($items);
// var_dump($answers);

// Create urls for navigation
$urlToCreate = url("book/create");
$urlToDelete = url("book/delete");



?><h1> <?= $items->title ?> </h1>

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
<h3>Svar</h3>
    <!-- <tr> -->
        <p><?= $answers->created ?> <?= $answers->nick ?></p>
    <!-- </tr> -->

    <!-- <tr> -->
        <p><?= $answers->text ?></p>
    <!-- </tr> -->

    <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kommentarer</h5>

    <?php foreach ($answercomments as $answercomment) : ?>

        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $answercomment->created ?> <?= $answercomment->nick ?></p>

        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $answercomment->text ?></p>

    <?php endforeach; ?>



<!-- </table> -->
