<?php

namespace App\Controller;

use App\Entity\Group;
use App\Form\GroupFormType;
use App\Repository\GroupRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GroupsController extends AbstractController
{
    private $em;
    private $groupRepository;
    public function __construct(GroupRepository $groupRepository, EntityManagerInterface $em)
    {
        $this->groupRepository = $groupRepository;
        $this->em = $em;
    }

    #[Route('/group', name: 'groups')]
    public function index(): Response
    {
        return $this->render('group/index.html.twig', [
            'groups' => $this->groupRepository->findBy(
                [],
                ['name' => 'ASC'],
        )]);
    }

    #[Route('/group/create', name: 'group_create')]
    public function create(Request $request): Response 
    {
        $group = new Group();
        $form = $this->createForm(GroupFormType::class, $group);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $newGroup = $form->getData();

            $this->em->persist($newGroup);
            $this->em->flush();

            return $this->redirectToRoute('groups');
        };

        return $this->render('group/create.html.twig', [
            'form' => $form->createView()
        ]);

    }

    #[Route('/group/edit/{id}', name: 'group_edit')]
    public function edit(Request $request, $id): Response 
    {
        $group = $this->groupRepository->find($id);
        $form = $this->createForm(GroupFormType::class, $group);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $newGroup = $form->getData();

            $this->em->persist($newGroup);
            $this->em->flush();

            return $this->redirectToRoute('groups');
        };

        return $this->render('group/edit.html.twig', [
            'form' => $form->createView(),
            'group' => $group
        ]);

    }

    #[Route('/group/delete/{id}', name: 'group_delete')]
    public function delete($id): Response
    {
        $group = $this->groupRepository->find($id);

        $this->em->remove($group);
        $this->em->flush();

        return $this->redirectToRoute('groups');
    }   
    
    #[Route('/group/{id}', name: 'group')]
    public function show($id): Response
    {
            return $this->render('group/show.html.twig', [
            'group' => $this->groupRepository->findOneBy(
                ['id' => $id],
                ['name' => 'ASC']
            )]);
    }

}
