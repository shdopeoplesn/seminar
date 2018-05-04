<?php
$temp="change_reviewer.doc";
header("Content-type:application");
header("Content-Disposition: attachment; filename=change_reviewer.doc");
readfile("change_reviewer.doc");
?>