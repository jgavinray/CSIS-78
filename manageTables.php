<?php

include "./includes/html.php";          // Please read this class, it contains all of
                                        // the objects and methods needed to speed build
                                        // a page for the website.
include "./includes/database.php";
include "./includes/user.php";

$thisPage = new HTML;                   // This method handles all of the opening HTML tags, and ensures that
                                        // sessions are activated.

$thisPage->connectToProductDatabase();  // This method handles the connection to the database
                                        // if the connection fails, it will display the error and
                                        // stop the further methods from being called.

$thisPage->adminBar();                  // This method calls a .css styled topbar and populates it
                                        // with the links and buttons that is bestowed on an admin user.

$thisPage->navigationBar();             // This method generates the left side navigation bar, adjustments
                                        // to the layout and style of this bar can be made by modifying
                                        // this method.

$thisPage->startContent();              // This method begins the main content of the page, somewhat similar
                                        // to the body.

//  This is the content section, good for passing query information.
echo "Hopefully this works well!";

//$thisPage->queryAllProductDatabase();   // The query methods require a call of the connectToXDatabase()
                                        // method before it can be used.

$thisPage->showAllUsers();

$thisPage->endContent();                // This closes the content section of the page.

$thisPage->endHtml();                   // Closes the HTML tags and general cleanup.

?>
