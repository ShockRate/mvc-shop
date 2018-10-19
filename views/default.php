
<?php
$loggedIn = Auth::loggedIn();
$admin = Auth::isAdmin();
$page_title = App::getRouter()->getController();


include_once HEADER;
echo $data['content'];
include_once FOOTER;
?>