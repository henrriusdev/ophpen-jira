<?php
return [
  ['GET', '/', [\MyApp\Infrastructure\Http\Controllers\TicketController::class, 'list']],
  ['POST', '/tickets', [\MyApp\Infrastructure\Http\Controllers\TicketController::class, 'create']]
];