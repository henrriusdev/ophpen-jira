<?php
namespace MyApp\Application;

use MyApp\Domain\Ticket;
use MyApp\Infrastructure\Persistence\TicketRepository;

class ListTickets
{
    private TicketRepository $repo;

    public function __construct()
    {
        $this->repo = new TicketRepository();
    }

    /**
     * @return Ticket[]
     */
    public function execute(): array
    {
        return $this->repo->getAll();
    }
}