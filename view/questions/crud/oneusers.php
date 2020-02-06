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

$questions = isset($questions) ? $questions : null;

$answers = isset($answers) ? $answers : null;

$questioncomments = isset($questioncomments) ? $questioncomments : null;

$tags = isset($tags) ? $tags : null;

// var_dump($items);
// var_dump($answers);

// Create urls for navigation
// $urlToCreate = url("book/create");
// $urlToDelete = url("book/delete");


?><h1><img src="<?= $users->gravatarUrl; ?>" alt="" /> <?= $items->nick ?></h1>


<?php if (!$items) : ?>
    <p>There are no books to show.</p>
    <?php
    return;
endif;
?>

<!-- <table> -->




    <h3><?= $items->nick ?> har ställt nedanstående frågor</h3>

    <?php foreach ($questions as $question) : ?>

        <p><a href="<?= url("questions/onequestion?id={$question->id}"); ?>"><?= $question->title ?></a></p>

    <?php endforeach; ?>



    <h3><?= $items->nick ?> har svarat på nedanstående frågor</h3>

<?php foreach ($answers as $answer) : ?>

    <?php $text = (strlen($answer->text) > 70) ? substr($answer->text,0,67).'...' : $answer->text; ?>


    <p><a href="<?= url("questions/onequestion?id={$answer->questionid}"); ?>"><?= $answer->questiontitle ?></a></p>


<?php endforeach; ?>

<!-- </table> -->
