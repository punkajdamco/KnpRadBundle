<?php

namespace Knp\RadBundle\tests\fixtures\src\App\Controller;

use Knp\RadBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FormController extends Controller
{
    public function formAction(Request $request)
    {
        $object = new \stdClass;
        $object->test = 'test';
        $form = $this->createBoundObjectForm($object);

        if ($form->isBound() && $form->isValid()) {
            return new Response('Success');
        }

        return array(
            'form' => $form->createView(),
        );
    }
}
