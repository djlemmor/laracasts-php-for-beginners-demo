<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
  $errors['body'] = 'The description can not be more than 1,000 characters.';
}

if (!empty($errors)) {
  return view('notes/create.view.php', [
    'heading' => 'Create Note',
    'errors' => $errors
  ]);
}

$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
  'body' => $_POST['body'],
  'user_id' => 4
]);

header('location: /notes');
exit();
