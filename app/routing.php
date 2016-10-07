<?php

use Ekkinox\SlimADR\Action\DashboardAction;

$app->get('/[{name}]', DashboardAction::class);