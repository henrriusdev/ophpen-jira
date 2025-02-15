<?php
namespace MyApp\Domain;

interface TicketRepositoryInterface{
    public function save(Ticket $ticket): void;
    public function getAll(): array;
}
