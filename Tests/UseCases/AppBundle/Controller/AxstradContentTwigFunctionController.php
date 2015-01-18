<?php

namespace Axstrad\Bundle\ContentBundle\Tests\UseCases\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AxstradContentTwigFunctionController extends Controller
{
    public function byEntityAction($contentReference)
    {
        return $this->render('AxstradContentBundleAppBundle::axstrad_content.html.twig', array(
            'axstrad_content' => $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('AxstradContentBundle:Content')
                ->findOneBy(array('reference' => $contentReference)),
        ));
    }
}
