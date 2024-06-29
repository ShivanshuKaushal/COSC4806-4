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
   public function create_reminder($user_id, $subject) {
        $db = db_connect();
        $statement = $db->prepare("INSERT INTO reminders (user_id, subject, created_at) VALUES (:user_id, :subject, NOW())");
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindParam(':subject', $subject, PDO::PARAM_STR);
        $statement->execute();
    }
  }  
  ?>