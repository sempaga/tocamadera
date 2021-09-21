<?php

namespace App\Controller;

use App\Entity\Cliente;
use App\Form\ClienteType;
use App\Repository\ClienteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

#[Route('/cliente')]
class ClienteController extends AbstractController
{
    #[Route('/', name: 'cliente_index', methods: ['GET'])]
    public function index(ClienteRepository $clienteRepository, Security $security): Response
    {

        $todos_los_clientes =  $clienteRepository->findAll();
        $clientes= array();

        //ROLE_ADMIN puede ver todos los pedidos
        if($security->isGranted('ROLE_ADMIN')){
            $clientes =  $todos_los_clientes;
            dump($clientes);
        }

        //ROLE_CLIENTE puede ver solo sus pedidos 
        if($security->isGranted('ROLE_CLIENTE')){
            $miperfil = array();
            foreach($todos_los_clientes as $cliente) {
                if($this->getUser() === $cliente->getUsuario())
              
                $miperfil[] = $cliente;
                dump($miperfil);

            }
            $clientes = $miperfil;
            
        } 
        return $this->render('cliente/index.html.twig', [
            'clientes' => $clientes
        ]);
    }

    #[Route('/new', name: 'cliente_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $cliente = new Cliente();
        $form = $this->createForm(ClienteType::class, $cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cliente);
            $entityManager->flush();

            return $this->redirectToRoute('cliente_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cliente/new.html.twig', [
            'cliente' => $cliente,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'cliente_show', methods: ['GET'])]
    public function show(Cliente $cliente): Response
    {
        return $this->render('cliente/show.html.twig', [
            'cliente' => $cliente,
        ]);
    }

    #[Route('/{id}/edit', name: 'cliente_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cliente $cliente): Response
    {
        $form = $this->createForm(ClienteType::class, $cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cliente_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cliente/edit.html.twig', [
            'cliente' => $cliente,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'cliente_delete', methods: ['POST'])]
    public function delete(Request $request, Cliente $cliente): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cliente->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cliente);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cliente_index', [], Response::HTTP_SEE_OTHER);
    }
}
