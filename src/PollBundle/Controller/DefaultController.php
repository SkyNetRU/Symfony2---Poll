<?php

namespace PollBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('PollBundle:Default:index.html.twig');
    }

    public function createAction()
    {
        $test = new Tests();
        $test->setTestName('First test');
        $test->setPublished(true);


        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($test);
        $em->flush();

        return new Response('Created new test '.$test->getTestName());
    }

    public function showAction($id)
    {
        $test = $this->getDoctrine()
            ->getRepository('PollBundle:Tests')
            ->find($id);

        if (!$test) {
            throw $this->createNotFoundException('No test found for id '.$id);
        }

        // делает что-нибудь, например передаёт объект $product в шаблон
    }


    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $test = $em->getRepository('PollBundle:Tests')->find($id);

        if (!$test) {
            throw $this->createNotFoundException('No test found for id '.$id);
        }

        $test->setTestName('New test name!');
        $em->flush();

        return $this->redirect($this->generateUrl('homepage'));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $test = $em->getRepository('PollBundle:Tests')->find($id);

        $em->remove($test);
        $em->flush();

        return $this->redirect($this->generateUrl('homepage'));
    }

    public function showAllAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $test = $em->getRepository('PollBundle:Tests')->findAllOrderedByName();

        if (!$test) {
            throw $this->createNotFoundException('Test not added yet ');
        }

        // делает что-нибудь, например передаёт объект $product в шаблон

        return $this->redirect($this->generateUrl('homepage'));
    }
}
