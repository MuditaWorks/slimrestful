<?php

//--------USUÁRIO
$app->post('/usuario', 'App\Action\UsuarioAction:gravar');
$app->get('/usuario', 'App\Action\UsuarioAction:listar');
$app->get('/usuario/{idusu}', 'App\Action\UsuarioAction:listar');
$app->delete('/usuario/{idusu}', 'App\Action\UsuarioAction:apagar');