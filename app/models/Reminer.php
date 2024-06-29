<?php

class Reminder {
  public function __construct() {

  }

  public function Get_all_reminder () {
    $db = db_connect();
    $statement = $db->prepare("select * from remidner;");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }