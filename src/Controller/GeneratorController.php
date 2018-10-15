<?php

namespace App\Controller;

use App\Entity\Action;
use App\Entity\Adjective;
use App\Entity\Noun;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GeneratorController extends AbstractController
{
    /**
     * @Route("/", name="generator")
     */
    public function index()
    {
        $action = $this->getDoctrine()
            ->getRepository(Action::class)
            ->getRandomValue();

        $adjective = $this->getDoctrine()
            ->getRepository(Adjective::class)
            ->getRandomValue();

        $noun = $this->getDoctrine()
            ->getRepository(Noun::class)
            ->getRandomValue();

        $idea = "{$action['value']} {$adjective['value']} {$noun['value']}";

        return $this->render('generator/index.html.twig', [
            'idea' => $idea,
        ]);
    }
}
