<?php 

namespace App\Controller\ListaTarefas;


use App\Repository\TarefaRepository;
use App\Service\CadastrarTarefaService;
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
    function cadastrar( Request $request, CadastrarTarefaService $cadastrarTarefaService): Response 
    {
       $inputNome = $request->request->get("nome");
       if($inputNome === "")
       {
            $this->addFlash('danger','campo nao pode ser vazio');
            return $this->redirectToRoute("listar");   
       }

       //logica de cadstra as tarefas
        $cadastrarTarefaService->adcionarTarefa(nome : $inputNome, status : true);

        return $this->redirectToRoute("listar");
    }

    #[Route("listar", name:"listar")]
    public function show(): Response
    {
        return $this->render("app/app.html.twig",
        [
            "tarefa" => $this->tarefaRepository->findAll(),
        ]
    );
    }

}
