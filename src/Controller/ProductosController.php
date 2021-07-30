<?php

namespace App\Controller;

use App\Entity\Categoria;
use App\Entity\Productos;
use App\Entity\Subcategoria;
use App\Form\ProductosType;
use App\Repository\ProductosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/productos')]
class ProductosController extends AbstractController
{
    #[Route('/', name: 'productos_index', methods: ['GET'])]
    public function index(ProductosRepository $productosRepository): Response
    {
        return $this->render('productos/index.html.twig', [
            'productos' => $productosRepository->findAll(),
            
        ]);
    }
     #[Route('/{subcategoria}', name: 'productos_subcategoria', methods: ['GET'], requirements:['subcategoria'=>'\d+'])]
    public function categoria(Subcategoria $subcategoria,ProductosRepository $productosRepository): Response
    {
        return $this->render('productos/index.html.twig', [
            'productos' => $productosRepository->findBySubcategoria($subcategoria),
            'subcategoria'=>$subcategoria
        ]);
    } 

    #[Route('/{subcategoria}/new', name: 'productos_new', methods: ['GET', 'POST'])]
    public function new(Request $request, Subcategoria $subcategoria): Response
    {
        $producto = new Productos();
        $form = $this->createForm(ProductosType::class, $producto);
        $form->handleRequest($request);
        // $rutaProyecto = $this->get('kernel')->getProjectDir();

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form['imagen']->getData();
            $extension = $file->guessExtension();
            $fileName= 'foto_producto_'.uniqid().'.'.$extension;
            $file->move('C:\Users\marip\tocamadera\public\images',$fileName);
            $producto->setImagen($fileName);
            dump($producto);
            $proveedores= $producto->getProveedors();
            dump($proveedores);
            $entityManager = $this->getDoctrine()->getManager();
            foreach ($proveedores as $proveedor){
                $proveedor->addProducto($producto);
                $entityManager->persist($proveedor);
            }

           $entityManager->persist($producto);
            
            $entityManager->flush();

           return $this->redirectToRoute('productos_subcategoria', ['subcategoria'=>$subcategoria->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('productos/new.html.twig', [
            'producto' => $producto,
            'subcategoria'=>$subcategoria,
            'form' => $form,
        ]);
    }

    //TODO: HACER NUEVO NEW CON REDIRECT A INDEX

    #[Route('/{id}', name: 'productos_show', methods: ['GET'])]
    public function show(Productos $producto): Response
    {
        return $this->render('productos/show.html.twig', [
            'producto' => $producto,
        ]);
    }

    #[Route('/{id}/edit', name: 'productos_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Productos $producto): Response
    {
        $form = $this->createForm(ProductosType::class, $producto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('productos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('productos/edit.html.twig', [
            'producto' => $producto,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'productos_delete', methods: ['POST'])]
    public function delete(Request $request, Productos $producto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$producto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($producto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('productos_subcategoria', ['subcategoria'=>$producto->getSubcategoria()->getId()], Response::HTTP_SEE_OTHER);
    }
}
