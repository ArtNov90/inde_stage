<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
 #[Route('/formulaire')]
  public function formulaire(): Response

 {
          return $this->render('main/formulaire.html.twig');
      }

    #[Route('/about')]
    public function about(): Response

    {
        return $this->render('main/about.html.twig');
    }
    #[Route('/home')]
    public function home(): Response

    {
        return $this->render('main/home.html.twig');
    }
    #[Route('/profil')]
    public function profil(): Response

    {
        return $this->render('main/profil.html.twig');
    }

    #[Route('/action')]
    public function action(): Response

    {
        return $this->render('main/action.html.twig');
    }

}



