<?php
namespace MyApp\Infrastructure\Http\Controllers;

use MyApp\Application\CreateTicket;
use MyApp\Application\ListTickets;
use MyApp\Domain\Ticket;

class TicketController
{
    public function list()
    {
        $listTickets = new ListTickets();
        $tickets =  $listTickets->execute();
        return require __DIR__ . '/../../../../templates/ticket/list.php';
    }

    public function create()
    {
        $data = $_POST;
        $ticket = new Ticket($data['title'], $data['description'], (int)$data['id']);
        $createTicket = new CreateTicket();
        $createTicket->execute($ticket);;
        header('Location: /tickets');;
        exit;
    }
}