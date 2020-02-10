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
$userpoints = isset($userpoints) ? $userpoints : null;
$questions = isset($questions) ? $questions : null;

// var_dump($items);

// Create urls for navigation



?><h1>Välkomna till Frågesidan</h1>

<p>På den här sidan finns det frågor med svar och kommentarer. För att ställa frågor, svara på frågor och kommentera frågor och svar måste du skapa en profil och logga in. Du kan skriva frågor, svar och kommentarer i Markdown.</p>

<!-- Underhållning, Natur/Vetenskap, Kultur/Litteratur, Geografi, Historia, Sport/Fritid -->


<?php if (!$tags) : ?>
    <p>There are no books to show.</p>
    <?php
    return;
endif;
?>


<h5>Här är de tre senaste frågorna.</h5>


<?php foreach ($questions as $question) : ?>
    <a href="<?= url("questions/onequestion?id={$question->id}"); ?>"><?= $question->title ?></a></p>
<?php endforeach; ?>



<h5>Här är de tre mest aktiva användarna. Klicka på en användares nick för att se vilka frågor den användaren har ställt och svarat på.</h5>


<?php foreach ($userpoints as $userpoint) : ?>
    <p><a href="<?= url("questions/oneusers?id={$userpoint->id}");?>"><?= $userpoint->nick ?></a> har ställt <?= $userpoint->questions ?> och svarat på <?= $userpoint->answers ?> frågor</p>
<?php endforeach; ?>






<h5>Här är de tre mest populära tagarna. Klicka på en tag för att se alla frågor som har den.</h5>


<?php foreach ($tags as $tag) : ?>
    <p><a href="<?= url("tags/viewsome?tagid={$tag->id}");?>"><?= $tag->tag?></a>  <?= $tag->points ?> frågor</p>
<?php endforeach; ?>
