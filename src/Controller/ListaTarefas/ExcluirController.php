<?php 

namespace App\Controller\ListaTarefas;

use App\Repository\TarefaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExcluirController extends AbstractController
{

    #[Route("listar/excluir/{id}", name:"excluir_lista")]
    function excluir(
        int $id,
        EntityManagerInterface $em,
        TarefaRepository $tarefaRepository,
    ) : Response 
    {
        $tarefa = $tarefaRepository->find($id);

        $em->remove($tarefa);
        $em->flush();

        return $this->redirectToRoute("listar");
    }
}
?>