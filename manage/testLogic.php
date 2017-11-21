<?php

require_once '../include.php';

echo "<br/><br/>";
$arr = array("username"=>"'Luffy'");
echo updateMember($arr, "id=3")."<br/><br/>";
var_dump(checkMembersAll());