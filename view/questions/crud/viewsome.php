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



?>

<p>
    <a href="<?= $urlToCreate ?>">Create</a> |
    <a href="<?= $urlToDelete ?>">Delete</a>
</p>

<h1>Frågor med tagen <?= $tags->tag ?></h1>

<?php if (!$questions) : ?>
    <p>Det finns inga frågor med den tagen.</p>
    <?php
    return;
endif;
?>


    <?php foreach ($questions as $question) : ?>
        <p><a href="<?= url("questions/onequestion?id={$question->questionid}"); ?>"><?= $question->title ?></a></p>

    <?php endforeach; ?>



<!-- </table> -->
