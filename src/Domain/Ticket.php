<?php
namespace MyApp\Domain;

class Ticket {
    public string $title;
    public string $description;
    private int $id;

    public function __construct(string $title, string $description, int $id) {
        $this->title = $title;
        $this->description = $description;
        $this->id = $id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getDescription(): string{
        return $this->description;
    }

    public function getId(): int {
        return $this->id;
    }
}