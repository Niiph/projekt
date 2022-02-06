<?php

namespace App\Controller;

use App\Repository\GroupRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GroupsController extends AbstractController
{
    private $groupRepository;
    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    #[Route('/group', name: 'groups')]
    public function index(): Response
    {
        return $this->render('group/index.html.twig', [
            'groups' => $this->groupRepository->findAll()
        ]);
    }
}
