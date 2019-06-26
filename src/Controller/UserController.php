<?php

namespace App\Controller;

use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/api/user/getAll", name="user_get_all", methods={"GET"})
     */
    public function getAll(Request $request, SerializerInterface $serializer)
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        $resializeUsers = $serializer->serialize($users, 'json');

        return new response($resializeUsers, 200);
    }
}