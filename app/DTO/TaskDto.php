<?php

namespace App\DTO;

class TaskDto
{
    private string $title;

    public function __construct(
        string                  $title,
        private readonly string $description,
        private readonly string $status,
        private readonly int    $priority,
    )
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            description: $data['description'],
            status: $data['status'],
            priority: $data['priority']
        );
    }
}
