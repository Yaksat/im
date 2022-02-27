<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\Json;

class ApiController extends AbstractController
{
    public function list(EntityManagerInterface $em)
    {
        $list = $em->getRepository('App:Category')->findBy(['Parent' => null]);

        $result = [];
        foreach ($list as $category) {
            $result[] = [
                'id' => $category->getId(),
                'name' => $category->getName(),
            ];
        }

        return new JsonResponse($result);
    }
}