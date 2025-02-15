<?php

namespace MyApp\Infrastructure\Persistence;

use MyApp\Domain\Ticket;
use MyApp\Domain\TicketRepositoryInterface;
use PDO;
use SQLite3;

class TicketRepository implements TicketRepositoryInterface{
    private SQLite3 $db;

    public function __construct()
    {
        $dbPath = __DIR__ . '/../../../database/tickets.db';
        $dbDir = dirname($dbPath);
        if (!is_dir($dbDir)) {
            mkdir($dbDir, 0777, true);
        }
        $this->db = new SQLite3($dbPath, SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
        $this->initializeDatabase();
    }

    private function initializeDatabase(): void
    {
        $this->db->QUERY('CREATE TABLE IF NOT EXISTS tickets (id INTEGER PRIMARY KEY AUTOINCREMENT, title TEXT, description TEXT)');
    }

    public function save(Ticket $ticket): void
    {
        $title = $this->db->escapeString($ticket->title);
        $description = $this->db->escapeString($ticket->description);
        $this->db->exec("BEGIN");
        $this->db->query("INSERT INTO tickets (title, description) VALUES ('$title', '$description')");
        $this->db->exec("COMMIT");
    }

    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM tickets');
        $tickets = [];
        while ($row = $stmt->fetchArray())
        {
            $tickets[] = new Ticket($row['title'], $row['description'], $row['id']);
        }
        return $tickets;
    }
}