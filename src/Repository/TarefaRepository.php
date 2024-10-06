<?php

namespace App\Repository;

use App\Entity\Tarefa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class TarefaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tarefa::class);
    }

    public function salvar(Tarefa $tarefa): void
    {
        $this->getEntityManager()->persist($tarefa);
        $this->getEntityManager()->flush();
    }
}
