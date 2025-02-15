<?php
namespace MyApp\Application;

use MyApp\Domain\Ticket;
use MyApp\Infrastructure\Persitence\TicketRepository;

class CreateTicket {
    private TicketRepository $repo;

    public function __construct()
    {
        $this->repo = new TicketRepository();
    }

    public function execute(Ticket $ticket)
    {
        $this->repo->save($ticket);
    }
}