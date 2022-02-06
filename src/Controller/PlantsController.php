<?php

namespace App\Controller;

use App\Repository\PlantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlantsController extends AbstractController
{
    private $plantRepository;
    public function __construct(PlantRepository $plantRepository)
    {
        $this->plantRepository = $plantRepository;
    }

    #[Route('/plant', name: 'plants')]
    public function index(): Response
    {
        return $this->render('plant/index.html.twig', [
            'plants' => $this->plantRepository->findAll()
        ]);
    }
}
