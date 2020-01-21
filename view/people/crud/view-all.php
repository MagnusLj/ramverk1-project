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
$urlToCreate = url("book/create");
$urlToDelete = url("book/delete");



?><h1>Se alla användare</h1>

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

<table>
    <tr>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($items as $item) : ?>
    <tr>
        <td><img src="<?php echo $item->gravatarUrl; ?>" alt="" /></td>
        <td><?= $item->nick ?></td>
    </tr>
    <?php endforeach; ?>
</table>
