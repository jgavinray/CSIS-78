<?php

include "./includes/html.php";
include "./includes/database.php";
include "./includes/user.php";

$thisPage = new HTML;

$thisPage->adminBar();

$thisPage->navigationBar();

$thisPage->startContent();

//  This is the content section, good for passing query information.
echo "Hopefully this works well!";

$thisPage->endContent();

$thisPage->endHtml();

?>
