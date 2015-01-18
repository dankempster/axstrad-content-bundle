<?php

namespace Axstrad\Bundle\ContentBundle\Tests\UseCases\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AxstradContentBundleAppBundle:Default:index.html.twig', array(
            'content' => $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('AxstradContentBundle:Content')
                ->findOneBy(array('reference' => 'my-content')),
        ));
    }
}
