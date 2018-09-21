
<?php
//to be erased
$loggedIn = TRUE;
$page_title = App::getRouter()->getController();
include_once HEADER;
echo $data['content'];
include_once FOOTER;
?>