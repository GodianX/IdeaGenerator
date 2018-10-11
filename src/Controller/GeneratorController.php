<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GeneratorController extends AbstractController
{
    /**
     * @Route("/", name="generator")
     */
    public function index()
    {
        $name = 'Добро пожаловать в Генератор';
        return $this->render('generator/index.html.twig', [
            'name' => $name,
        ]);
    }
}
