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

// Create urls for navigation




?><h1>Se alla användare</h1>


<?php if (!$items) : ?>
    <p>Det finns inga användare.</p>
    <?php
    return;
endif;
?>

<table>
    <tr>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($items as $item) : ?>
    <tr>
        <td>
<a href="<?= url("questions/oneusers?id={$item->id}"); ?>">
            <img src="<?php echo $item->gravatarUrl; ?>" alt="" />
</a>
        </td>
        <td><a href="<?= url("questions/oneusers?id={$item->id}"); ?>"><?= $item->nick ?></a></td>
    </tr>
    <?php endforeach; ?>
</table>
