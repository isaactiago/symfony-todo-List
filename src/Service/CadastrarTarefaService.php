<?php 

namespace App\Service;

use App\Entity\Tarefa;
use App\Repository\TarefaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CadastrarTarefaService extends AbstractController
{
    private TarefaRepository $tarefaRepository;
  

    public function __construct(
        TarefaRepository $tarefaRepository,
       
    )
    {
        $this->tarefaRepository = $tarefaRepository;
    }

    public function adcionarTarefa( string $nome, bool $status): void
    {
        // Verifica se já existe uma tarefa com o mesmo nome
         $tarefaExistente = $this->tarefaRepository->findOneBy(['nomeDaTarefa' => $nome]);

        if ($tarefaExistente) {
            $this->addFlash('danger', 'Tarefa já existe');
            $this->redirectToRoute("listar");
            // Retorna para evitar continuar a execução
            return;
        }

        $tarefa = new Tarefa();
        $tarefa->setNomeDaTarefa($nome);
        $tarefa->setStatus($status);
        $tarefa = $this->tarefaRepository->salvar($tarefa);
    }
}

?>