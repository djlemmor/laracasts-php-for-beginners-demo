<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

/* Notes Routes */
$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->get('/note', 'controllers/notes/show.php');
$router->get('/notes/create', 'controllers/notes/create.php');
$router->get('/note/edit', 'controllers/notes/edit.php');
$router->post('/notes', 'controllers/notes/store.php');
$router->patch('/note', 'controllers/notes/update.php');
$router->delete('/note', 'controllers/notes/destroy.php');

/* Registration Routes */
$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php')->only('guest');

/* Login Routes */
$router->get('/login', 'controllers/session/create.php')->only('guest');

/* Session Routes */
$router->post('/session', 'controllers/session/store.php')->only('guest');
$router->delete('/session', 'controllers/session/destroy.php')->only('auth');
