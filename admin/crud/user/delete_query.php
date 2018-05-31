<?php

require_once '../../../model/database.php';

$id = $_GET["id"];

deleteEntity("user", $id);