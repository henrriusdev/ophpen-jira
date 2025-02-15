<?php

namespace MyApp\Infrastructure\Persitence;

use MyApp\Domain\Ticket;
use MyApp\Domain\TicketRepositoryInterface;
use PDO;

class TicketRepository implements TicketRepositoryInterface{
    private PDO $db;

    public function __construct()
    {
        $this->db = new PDO('sqlite:' . __DIR__ . '/../../database/tickets.db');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->initializeDatabase();
    }

    private function initializeDatabase(): void
    {
        $this->db->exec('CREATE TABLE IF NOT EXISTS tickets (id INTEGER PRIMARY KEY AUTOINCREMENT, title TEXT, description TEXT)');
    }

    public function save(Ticket $ticket): void
    {
        $stmt = $this->db->prepare('INSERT INTO tickets (title, description) VALUES (:title, :description)');
        $stmt->execute([':title' => $ticket->getTitle(), ':description' => $ticket->getDescription()]);
    }

    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM tickets');
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tickets = [];
        foreach ($rows as $row) {
            $tickets[] = new Ticket($row['title'], $row['description'], $row['id']);
        }
        return $tickets;
    }
}