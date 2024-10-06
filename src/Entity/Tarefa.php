<?php

namespace App\Entity;

use App\Repository\TarefaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TarefaRepository::class)]
class Tarefa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nomeDaTarefa = null;

    #[ORM\Column]
    private ?bool $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomeDaTarefa(): ?string
    {
        return $this->nomeDaTarefa;
    }

    public function setNomeDaTarefa(string $nomeDaTarefa): static
    {
        $this->nomeDaTarefa = $nomeDaTarefa;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): static
    {
        $this->status = $status;

        return $this;
    }
}
