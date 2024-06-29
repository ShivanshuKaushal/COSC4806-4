<?php

class Reminder extends Controller {

  public function index(){
     $reminder = $this->model('Reminder');
     $list_reminders = $reminder->getAll_reminders();
     $this->view('reminders/index', ["reminders" => $list_reminders]);
   }

   public function create(){
     $this->view('reminders/create');
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $_SESSION['subject'] = $_POST['subject'];
         $reminder = $this->model('Reminder');
         $reminder->create_reminder($_SESSION['userid'], $_SESSION['subject']);
         unset($_SESSION['subject']);
         header('Location: /reminders');
     } else {
         $this->view('reminders/create');
     }
   }

