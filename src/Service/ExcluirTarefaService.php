<?php 

namespace App\Service;

use App\Repository\TarefaRepository;
use Doctrine\ORM\EntityManagerInterface;

class ExcluirTarefaService
{
    private TarefaRepository $tarefaRepository;
    private EntityManagerInterface $em;

    public function __construct(
        EntityManagerInterface $em,
        TarefaRepository $tarefaRepository,
    )
    {
        $this->tarefaRepository = $tarefaRepository;
        $this->em = $em;
    }

    public function excluirTarefa( int $id): void
    {
        $tarefa = $this->tarefaRepository->find($id);
        $this->em->remove($tarefa);
        $this->em->flush();
    }
}
?>