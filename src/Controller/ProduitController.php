<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ProduitController extends AbstractController
{
    /**
     * @Route("/api/product/category/{category}", name="product_get_by_category", methods={"GET"})
     */
    public function getProductByCategory(Request $request, Category $category, SerializerInterface $serializer)
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findByCategory($category);
        $resializeProducts = $serializer->serialize($products, 'json');

        return new response($resializeProducts, 200);
    }
}