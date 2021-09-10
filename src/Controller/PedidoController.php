<?php

namespace App\Controller;

use App\Entity\Pedido;
use App\Form\PedidoType;
use App\Repository\PedidoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\DuplicateKeyException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

#[Route('/pedido')]
class PedidoController extends AbstractController
{
    #[Route('/', name: 'pedido_index', methods: ['GET'])]
    public function index(PedidoRepository $pedidoRepository, Security $security): Response
    {

        $todos_los_pedidos = $pedidoRepository->findAll();
        $pedidos= array();

        //ROLE_ADMIN puede ver todos los pedidos
        if($security->isGranted('ROLE_ADMIN')){
            $pedidos = $todos_los_pedidos;
        }

        //ROLE_CLIENTE puede ver solo sus pedidos 
        if($security->isGranted('ROLE_CLIENTE')){
            $mispedidos = array();
            foreach($todos_los_pedidos as $pedido) {
                if($this->getUser() === $pedido->getCliente()->getUsuario())
              
                $mispedidos[] = $pedido;
                dump($mispedidos);

            }
            $pedidos = $mispedidos;
            
        } 

       
        return $this->render('pedido/index.html.twig', [
            
            'pedidos' => $pedidos
        ]);
       
    }

    #[Route('/new', name: 'pedido_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $pedido = new Pedido();
        $form = $this->createForm(PedidoType::class, $pedido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $pedido->setCliente($this->getUser()->getCliente());
            $entityManager->persist($pedido);
            $entityManager->flush();

            return $this->redirectToRoute('pedido_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pedido/new.html.twig', [
            'pedido' => $pedido,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'pedido_show', methods: ['GET'])]
    public function show(Pedido $pedido): Response
    {
        $this->denyAccessUnlessGranted('show', $pedido, 'No tienes permiso para entrar aqui');
        return $this->render('pedido/show.html.twig', [
            'pedido' => $pedido,
        ]);
    }

    #[Route('/{id}/edit', name: 'pedido_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pedido $pedido): Response
    {
        $form = $this->createForm(Pedido1Type::class, $pedido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pedido_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pedido/edit.html.twig', [
            'pedido' => $pedido,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'pedido_delete', methods: ['POST'])]
    public function delete(Request $request, Pedido $pedido): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pedido->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pedido);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pedido_index', [], Response::HTTP_SEE_OTHER);
    }
}
