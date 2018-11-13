<?php

namespace App\Controller;

use App\Entity\Action;
use App\Entity\Adjective;
use App\Entity\Noun;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AddIdeaForm;

class GeneratorController extends AbstractController
{
    /**
     * @Route("/", name="generator")
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
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

        $form = $this->createForm(AddIdeaForm::class, null, [
            'method' => 'POST',
        ]);

        $form->handleRequest($request);
        if (!empty($form->getData())) {
            $idea = $this->addIdea($form->getData());
        }

        return $this->render('generator/index.html.twig', [
            'idea' => $idea,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param array $words
     * @return string
     */
    private function addIdea(array $words): string
    {
        $entityManager = $this->getDoctrine()->getManager();
        $actionNew =  new Action();
        $adjectiveNew = new Adjective();
        $nounNew = new Noun();

        $actionNew->setValue($words['action']);
        $adjectiveNew->setValue($words['adjective']);
        $nounNew->setValue($words['noun']);

        $entityManager->persist($actionNew);
        $entityManager->persist($adjectiveNew);
        $entityManager->persist($nounNew);

        $entityManager->flush();

        return "{$words['action']} {$words['adjective']} {$words['noun']}";
    }
}
