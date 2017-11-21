<?php

var_dump(function_exists("posix_access"));

echo "<br/>result is: " . extension_loaded('pcntl') . "<br/>";

print_r(get_loaded_extensions());

phpinfo();