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

// var_dump($items);

// Create urls for navigation



?><h1>Alla frågor</h1>


<?php if (!$items) : ?>
    <p>Det finns inga frågor.</p>
    <?php
    return;
endif;
?>


    <?php foreach ($items as $item) : ?>
        <p><?= $item->nick ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <a href="<?= url("questions/onequestion?id={$item->id}"); ?>"><?= $item->title ?></a></p>

    <?php endforeach; ?>
</table>
