<?php

namespace App\Controller;

use App\Entity\Donateur;
use App\Form\DonateurType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DonateurController extends AbstractController
{
    #[Route('/formulaire', name: 'app_donateur')]
    public function create(
        Request $request,
        EntityManagerInterface $entityManager): Response
    {
        //crée une instance de mon entité
        $donateur = new Donateur();
        $donateur->setPeutSeRendreEnInde('oui'); // Définit la valeur par défaut ici
        $donateurForm = $this->createForm(DonateurType::class, $donateur);

        $donateurForm->handleRequest($request);

        if ($donateurForm->isSubmitted() && $donateurForm->isValid()){

            $entityManager->persist($donateur);
            $entityManager->flush();

            $this->addFlash('success', 'Vous être inscrit!');
           return $this->redirectToRoute('app_main_home',['id'=> $donateur->getId()]);

        }

        return $this->render('main/formulaire.html.twig', [
            'donateurForm' => $donateurForm->createView()
        ]);


    }
    #[Route('/profil/{id}', name: 'profil', requirements: ['id' => '\d+'], defaults: ['id' => null])]
    function profil(?Donateur $donateur): Response
    {
        if (!$donateur) {
            // Gérer le cas où aucun ID n'est spécifié dans l'URL
            // Par exemple, rediriger vers une autre page ou afficher un message d'erreur

            return $this->redirectToRoute('app_main_home');
        }

        // Récupérer et afficher les données du profil pour le Donateur donné ($donateur)
        return $this->render('main/profil.html.twig', [
            'donateur' => $donateur,
        ]);
    }


}
