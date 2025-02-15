<?php
namespace MyApp\Domain;

class Ticket {
    private string $title;
    private string $description;
    private int $id;

    public function _construct(string $title, string $description, int $id) {
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