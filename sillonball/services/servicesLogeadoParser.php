<?php

include __DIR__ . '/servicesLogeado.php';

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

$services = new servicesLogeado();

$redirect_to = $services->$action();

header('location: ' . $redirect_to);