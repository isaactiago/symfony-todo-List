<?php 

namespace App\Controller\ListaTarefas;

use App\Entity\Tarefa;
use App\Repository\TarefaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CadastrarController extends AbstractController
{

    public function __construct(
        private TarefaRepository $tarefaRepository,
    )
    {
    }

    #[Route("listar/cadastrar", name:"cadastrar")]
    function cadastrar( Request $request): Response 
    {
       $inputNome = $request->request->get("nome");
      
       if($inputNome === "")
       {
            $this->addFlash('danger','campo nao pode ser vazio');
            return $this->redirectToRoute("app");   
       }

       $tarefa = New Tarefa();
       $tarefa->setNomeDaTarefa($inputNome);
       $tarefa->setStatus(true);
       $this->tarefaRepository->salvar($tarefa);
       
        return $this->render("app/app.html.twig",[
            'tarefa' => $this->tarefaRepository->findAll(),
        ]);
    }
}
?>