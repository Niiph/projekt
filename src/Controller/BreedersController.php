<?php

namespace App\Controller;

use App\Repository\BreederRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BreedersController extends AbstractController
{
    private $breederRepository;
    public function __construct(BreederRepository $breederRepository)
    {
        $this->breederRepository = $breederRepository;
    }

    #[Route('/breeder', name: 'breeders')]
    public function index(): Response
    {
        return $this->render('breeder/index.html.twig', [
            'breeders' => $this->breederRepository->findAll()
        ]);
    }
}
