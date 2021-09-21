<?php

namespace App\Controller;

use App\Entity\Categoria;
use App\Entity\Subcategoria;
use App\Form\SubcategoriaType;
use App\Repository\SubcategoriaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/subcategoria')]
class SubcategoriaController extends AbstractController
{
    #[Route('/{categoria}', name: 'subcategoria_index', methods: ['GET'], requirements:['categoria'=>'\d+'])]
    public function index(SubcategoriaRepository $subcategoriaRepository, Categoria $categoria): Response
    {
        return $this->render('subcategoria/index.html.twig', [
            'subcategorias' => $subcategoriaRepository->findByCategoria($categoria),
            'categoria'=>$categoria
        ]);
    }

    #[Route('/{categoria}/new', name: 'subcategoria_new', methods: ['GET', 'POST'])]
    public function new(Request $request, Categoria $categoria): Response
    {

        $subcategorium = new Subcategoria();
        $form = $this->createForm(SubcategoriaType::class, $subcategorium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form['imagen']->getData();
            $extension = $file->guessExtension();
            $fileName= 'foto_subcategoria_'.uniqid().'.'.$extension;
            $file->move('C:\Users\marip\tocamadera\public\images',$fileName);
            $subcategorium->setImagen($fileName);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($subcategorium);
            $entityManager->flush();

            return $this->redirectToRoute('subcategoria_index', ['categoria'=>$categoria->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('subcategoria/new.html.twig', [
            'subcategorium' => $subcategorium,
            'categoria'=>$categoria,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'subcategoria_show', methods: ['GET'])]
    public function show(Subcategoria $subcategorium): Response
    {
        return $this->render('subcategoria/show.html.twig', [
            'subcategorium' => $subcategorium,
        ]);
    }

    #[Route('/{id}/edit', name: 'subcategoria_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Subcategoria $subcategorium): Response
    {
        $form = $this->createForm(SubcategoriaType::class, $subcategorium);
        $form->handleRequest($request);
        $categoria= $subcategorium->getCategoria();

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subcategoria_index', ['categoria'=>$categoria->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('subcategoria/edit.html.twig', [
            'subcategorium' => $subcategorium,
            'categoria'=>$categoria,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'subcategoria_delete', methods: ['POST'])]
    public function delete(Request $request, Subcategoria $subcategorium): Response
    {
        $categoria= $subcategorium->getCategoria();
        if ($this->isCsrfTokenValid('delete'.$subcategorium->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($subcategorium);
            $entityManager->flush();
        }

        return $this->redirectToRoute('subcategoria_index', ['categoria'=>$categoria->getId()], Response::HTTP_SEE_OTHER);
    }
}
