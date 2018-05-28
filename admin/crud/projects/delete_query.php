<?php

require_once '../../../model/database.php';

$id = $_GET["id"];

deleteEntity("member", $id);

header("Location: index.php");