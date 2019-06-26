<?php

namespace App\Controller;

use App\Entity\Cart;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class CartController extends AbstractController
{
    /**
     * @Route("/api/cart/getAll", name="user_get_all", methods={"GET"})
     */
    public function getAll(Request $request, SerializerInterface $serializer)
    {

        $carts = $this->getDoctrine()->getRepository(User::class)->findAll();
        $resializeUsers = $serializer->serialize($carts, 'json');

        return new response($resializeUsers, 200);
    }

    /**
     * @Route("/api/cart/{cart}/validate", name="validate_cart", methods={"POST"})
     */
    public function validate(Request $request, Cart $cart)
    {

        $cart = $this->getDoctrine()->getRepository(Cart::class)->find($cart);

        foreach ($cart->getProducts() as $product) {
            if ($product->getStock() == 0) {
                return new Response("Le produit : " . $product->getName() . " n'est plus en stock", 500);
            } else {
                $product->setStock($product->getStock() - 1);
                $this->getDoctrine()->getManager()->persist($product);
            }
        }
        $this->getDoctrine()->getManager()->flush();

        return new response("La validation a bien eu lieu", 200);
    }
}