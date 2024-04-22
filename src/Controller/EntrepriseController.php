<?php

namespace App\Controller;


use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EntrepriseController extends AbstractController
{
    #[Route('/entreprise', name: 'app_entreprise')]
    // public function index(EntityManagerInterface $entityManager): Response
    public function index(EntrepriseRepository  $entrepriseRepository): Response
    {
        // $entreprises = $entityManager->getRepository(Entreprise::class)->findAll();
        // SELECT * FROM entreprise WHERE ville = Strasbourg ORDER BY raisonSociale, requête que nous retrouvons dans EntrepriseRepository
        $entreprises = $entrepriseRepository->findBy([], ["raisonSociale" => "ASC"]);
        return $this->render('entreprise/index.html.twig', [
            'entreprises' => $entreprises 
        ]);
    }

    // la route récupère l'id de l'objet que nous souhaitons
    #[Route('/entreprise/{id}', name: 'show_entreprise')]
    // en argument nous metton l'objet grace auquel nous récupérons l'id et ses propriétées
    public function show(Entreprise $entreprise): Response
    {
        return $this->render('entreprise/show.html.twig', [
            'entreprise' => $entreprise
        ]);
    }
}
