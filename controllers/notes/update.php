<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 4;
$errors = [];
$note = $db->query('select * from notes where id = :id', [
  'id' => $_POST['id'],
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

if (!Validator::string($_POST['body'], 1, 1000)) {
  $errors['body'] = 'The description can not be more than 1,000 characters.';
}

if (!empty($errors)) {
  return
    view('notes/edit.view.php', [
      'heading' => 'Edit Note',
      'note' => $note,
      'errors' => $errors
    ]);
}

$db->query('UPDATE notes SET body = :body WHERE id = :id', [
  'id' => $_POST['id'],
  'body' => $_POST['body']
]);

header('location: /notes');
exit();
