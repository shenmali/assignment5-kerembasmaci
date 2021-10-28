<?php

namespace App\Controller;

use App\Entity\Doctest;
use App\Form\Type\DoctestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class DoctestController extends AbstractController
{
    /**
     * @Route("/doctest", name="doctest")
     */
    public function index(Request $request): Response
    {
        // just setup a fresh $task object (remove the example data)
        $doctest = new Doctest();
        // $task = new Task();

        $form = $this->createForm(DoctestType::class, $doctest);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();
            
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($doctest);

            $entityManager->flush();

            echo "success"; exit;
        }

        return $this->render('task/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/showlist", name="show")
     */
    public function showlist()
    {
        $repo=$this->getDoctrine()->getRepository(Doctest::class);
        $scores = $repo->findAll();

        return $this->render('task/list.html.twig', [
            'skorlar' => $scores,
        ]);
    }
}

// {% if skor.score > 70 %}
//             {% set status = 'PASS' %}
//             {% else %}
//             {% set status = 'FAIL!' %}
//         {% endif %}