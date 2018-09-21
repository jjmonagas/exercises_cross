<?php

namespace App\Controller;

use App\Entity\RepetitionMaximum;
use App\Form\RepetitionMaximumType;
use App\Repository\RepetitionMaximumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/repetition/maximum")
 */
class RepetitionMaximumController extends Controller
{
    /**
     * @Route("/", name="repetition_maximum_index", methods="GET")
     */
    public function index(RepetitionMaximumRepository $repetitionMaximumRepository): Response
    {
        return $this->render('repetition_maximum/index.html.twig', ['repetition_maximums' => $repetitionMaximumRepository->findAll()]);
    }

    /**
     * @Route("/new", name="repetition_maximum_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $repetitionMaximum = new RepetitionMaximum();
        $form = $this->createForm(RepetitionMaximumType::class, $repetitionMaximum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($repetitionMaximum);
            $em->flush();

            return $this->redirectToRoute('repetition_maximum_index');
        }

        return $this->render('repetition_maximum/new.html.twig', [
            'repetition_maximum' => $repetitionMaximum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="repetition_maximum_show", methods="GET")
     */
    public function show(RepetitionMaximum $repetitionMaximum): Response
    {
        return $this->render('repetition_maximum/show.html.twig', ['repetition_maximum' => $repetitionMaximum]);
    }

    /**
     * @Route("/{id}/edit", name="repetition_maximum_edit", methods="GET|POST")
     */
    public function edit(Request $request, RepetitionMaximum $repetitionMaximum): Response
    {
        $form = $this->createForm(RepetitionMaximumType::class, $repetitionMaximum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('repetition_maximum_edit', ['id' => $repetitionMaximum->getId()]);
        }

        return $this->render('repetition_maximum/edit.html.twig', [
            'repetition_maximum' => $repetitionMaximum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="repetition_maximum_delete", methods="DELETE")
     */
    public function delete(Request $request, RepetitionMaximum $repetitionMaximum): Response
    {
        if ($this->isCsrfTokenValid('delete'.$repetitionMaximum->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($repetitionMaximum);
            $em->flush();
        }

        return $this->redirectToRoute('repetition_maximum_index');
    }
}
