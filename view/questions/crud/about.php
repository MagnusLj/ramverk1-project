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



?><h1>Om den här sidan</h1>

<p>Den här sidan är gjort i PHP och PHP-ramverket Anax. Det används sqlite och på sina håll även Active Record Model för databashanteringen. Sidan är gjord för projektet i kursen Ramverk1. Här är en <a href="https://github.com/MagnusLj/ramverk1-project">länk till GitHub-repot</a>. Jag studerar Webbprogrammering 120 poäng på BTH på andra året och jobbar annars med sjukvård och relaterade saker.</p>

<!-- Underhållning, Natur/Vetenskap, Kultur/Litteratur, Geografi, Historia, Sport/Fritid -->
