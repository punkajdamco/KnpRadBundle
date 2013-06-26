<?php

namespace Knp\RadBundle\tests\fixtures\app\Controller;

use Knp\RadBundle\Controller\Controller;

class FormController extends Controller
{
    public function formAction(Requetss $request)
    {
        $object = new \stdClass;
        $object->input = 'test';

        return $this->render('TwigBundle::layout.html.twig', array(
            'form' => $this->createBoundObjectForm($object),
        ));
    }
}
