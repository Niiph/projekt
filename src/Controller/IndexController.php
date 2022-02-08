<?php

namespace App\Controller;

use App\Repository\PlantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
       private $plantRepository;
    public function __construct(PlantRepository $plantRepository)
    {
        $this->plantRepository = $plantRepository;
    }

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('/index.html.twig', [
            'plants' => $this->plantRepository->findBy(
                [],
                ['id' => 'desc'],
                6
        )]);
    }
}
