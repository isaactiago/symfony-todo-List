<?php 

namespace App\Controller\ListaTarefas;

use App\Repository\TarefaRepository;
use App\Service\ExcluirTarefaService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExcluirController extends AbstractController
{

    #[Route("listar/excluir/{id}", name:"excluir_lista")]
    function excluir(
        int $id,
       ExcluirTarefaService $excluirTarefaService,
    ) : Response 
    {
        $excluirTarefaService->excluirTarefa(id: $id);
        return $this->redirectToRoute("listar");
    }
}
?>