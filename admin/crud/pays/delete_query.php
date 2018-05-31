<?php

require_once '../../../model/database.php';

$id = $_GET["id"];

deleteEntity("pays", $id);