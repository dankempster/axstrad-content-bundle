<?php

namespace Axstrad\Bundle\ContentBundle\Tests\UseCases\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AxstradContentHeadingTwigFunctionController extends Controller
{
    public function byEntityAction($contentReference, $asArg = 'no_arg')
    {
        if ('as-arg' === $asArg) {
            $template = "with_arg.html.twig";
            $templateParam = 'arg';
        }
        else {
            $template = "no_arg.html.twig";
            $templateParam = 'axstrad_content';
        }

        return $this->render('AxstradContentBundleAppBundle:axstrad_content_heading:'.$template, array(
            $templateParam => $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('AxstradContentBundle:Content')
                ->findOneBy(array('reference' => $contentReference)),
        ));
    }

    public function byReferenceAction($contentReference, $asArg = 'no_arg')
    {
        if ('as-arg' === $asArg) {
            $template = "with_arg.html.twig";
            $templateParam = 'arg';
        }
        else {
            $template = "no_arg.html.twig";
            $templateParam = 'axstrad_content';
        }

        return $this->render('AxstradContentBundleAppBundle:axstrad_content_heading:'.$template, array(
            $templateParam => $contentReference,
        ));
    }
}
