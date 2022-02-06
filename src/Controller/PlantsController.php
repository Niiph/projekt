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

    #[Route('/plant', methods: ['GET'], name: 'plants')]
    public function index(): Response
    {
        return $this->render('plant/index.html.twig', [
            'plants' => $this->plantRepository->findBy(
                array(),
                array('name' => 'ASC'),
        )]);
    }

    #[Route('/plant/{id}', methods: ['GET'], name: 'plant')]
    public function show($id): Response
    {
        return $this->render('plant/show.html.twig', [
            'plant' => $this->plantRepository->find($id)
        ]);
    }
}
