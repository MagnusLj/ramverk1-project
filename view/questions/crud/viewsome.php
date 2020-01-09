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

$questioncomments = isset($questioncomments) ? $questioncomments : null;

$tags = isset($tags) ? $tags : null;

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

    <!-- <tr> -->
        <p><?= $items->created ?> <?= $items->nick ?></p>
    <!-- </tr> -->

    <!-- <tr> -->
        <p><?= $items->text ?></p>
    <!-- </tr> -->


    <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tags</h5>

    <?php foreach ($tags as $tag) : ?>

        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $tag->tag ?></p>

    <?php endforeach; ?>


    <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kommentarer</h5>

    <?php foreach ($questioncomments as $questioncomment) : ?>

        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $questioncomment->created ?> <?= $questioncomment->nick ?></p>

        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $questioncomment->text ?></p>

    <?php endforeach; ?>



    <h3>Svar</h3>

<?php foreach ($answers as $answer) : ?>

    <?php $text = (strlen($answer->text) > 70) ? substr($answer->text,0,67).'...' : $answer->text; ?>

    <p><?= $answer->created ?> <?= $answer->nick ?></p>

    <a href="<?= url("questions/oneanswer?id={$items->id}&answerid={$answer->id}"); ?>"><?= $text ?></a>


<?php endforeach; ?>

<!-- </table> -->
