<?php

namespace App\Controller;

use App\Entity\ModoPago;
use App\Form\ModoPagoType;
use App\Repository\ModoPagoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/modo/pago')]
class ModoPagoController extends AbstractController
{
    #[Route('/', name: 'modo_pago_index', methods: ['GET'])]
    public function index(ModoPagoRepository $modoPagoRepository): Response
    {
        return $this->render('modo_pago/index.html.twig', [
            'modo_pagos' => $modoPagoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'modo_pago_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $modoPago = new ModoPago();
        $form = $this->createForm(ModoPagoType::class, $modoPago);
        $form->handleRequest($request);
        $cliente = $this->getUser()->getCliente();
        dump($cliente);

        if ($form->isSubmitted() && $form->isValid()) {
            $modoPago->setCliente($cliente);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($modoPago);
            $entityManager->flush();

            return $this->redirectToRoute('modo_pago_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('modo_pago/new.html.twig', [
            'modo_pago' => $modoPago,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'modo_pago_show', methods: ['GET'])]
    public function show(ModoPago $modoPago): Response
    {
        return $this->render('modo_pago/show.html.twig', [
            'modo_pago' => $modoPago,
        ]);
    }

    #[Route('/{id}/edit', name: 'modo_pago_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ModoPago $modoPago): Response
    {
        $form = $this->createForm(ModoPagoType::class, $modoPago);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('modo_pago_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('modo_pago/edit.html.twig', [
            'modo_pago' => $modoPago,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'modo_pago_delete', methods: ['POST'])]
    public function delete(Request $request, ModoPago $modoPago): Response
    {
        if ($this->isCsrfTokenValid('delete'.$modoPago->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($modoPago);
            $entityManager->flush();
        }

        return $this->redirectToRoute('modo_pago_index', [], Response::HTTP_SEE_OTHER);
    }
}
