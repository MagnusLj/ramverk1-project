<?php

namespace Anax\View;

/**
 * View to display all books.
 */
// Show all incoming variables/functions
//var_dump(get_defined_functions());
//echo showEnvironment(get_defined_vars());

// Gather incoming variables and use default values if not set
$tags = isset($tags) ? $tags : null;

// var_dump($items);

// Create urls for navigation
$urlToCreate = url("book/create");
$urlToDelete = url("book/delete");



?><h1>Alla tags</h1>

<!-- Underhållning, Natur/Vetenskap, Kultur/Litteratur, Geografi, Historia, Sport/Fritid -->


<?php if (!$tags) : ?>
    <p>There are no books to show.</p>
    <?php
    return;
endif;
?>

<p>Välj en tag nedan för att se alla frågor kopplade till den tagen.</p>

<p><a href="<?= url("tags/viewsome?tag=geografi"); ?>">Geografi</a></p>
<p><a href="<?= url("tags/viewsome?tag=historia"); ?>">Historia</a></p>
<p><a href="<?= url("tags/viewsome?tag=kulturlitteratur"); ?>">Kultur/Litteratur</a></p>
<p><a href="<?= url("tags/viewsome?tag=naturvetenskap"); ?>">Natur/Vetenskap</a></p>
<p><a href="<?= url("tags/viewsome?tag=sportfritid"); ?>">Sport/Fritid</a></p>
<p><a href="<?= url("tags/viewsome?tag=underhallning"); ?>">Underhållning</a></p>
