<?php

namespace PollBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PollBundle\Entity\Tests;
use PollBundle\Form\TestsType;

/**
 * Tests controller.
 *
 * @Route("/tests")
 */
class TestsController extends Controller
{
    /**
     * Lists all Tests entities.
     *
     * @Route("/", name="tests_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tests = $em->getRepository('PollBundle:Tests')->findAll();

        return $this->render('tests/index.html.twig', array(
            'tests' => $tests,
        ));
    }

    /**
     * Creates a new Tests entity.
     *
     * @Route("/new", name="tests_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $test = new Tests();
        $form = $this->createForm('PollBundle\Form\TestsType', $test);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($test);
            $em->flush();

            return $this->redirectToRoute('tests_show', array('id' => $tests->getId()));
        }

        return $this->render('tests/new.html.twig', array(
            'test' => $test,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tests entity.
     *
     * @Route("/{id}", name="tests_show")
     * @Method("GET")
     */
    public function showAction(Tests $test)
    {
        $deleteForm = $this->createDeleteForm($test);

        return $this->render('tests/show.html.twig', array(
            'test' => $test,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Tests entity.
     *
     * @Route("/{id}/edit", name="tests_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Tests $test)
    {
        $deleteForm = $this->createDeleteForm($test);
        $editForm = $this->createForm('PollBundle\Form\TestsType', $test);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($test);
            $em->flush();

            return $this->redirectToRoute('tests_edit', array('id' => $test->getId()));
        }

        return $this->render('tests/edit.html.twig', array(
            'test' => $test,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Tests entity.
     *
     * @Route("/{id}", name="tests_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Tests $test)
    {
        $form = $this->createDeleteForm($test);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($test);
            $em->flush();
        }

        return $this->redirectToRoute('tests_index');
    }

    /**
     * Creates a form to delete a Tests entity.
     *
     * @param Tests $test The Tests entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tests $test)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tests_delete', array('id' => $test->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
