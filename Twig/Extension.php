<?php
namespace Axstrad\Bundle\ContentBundle\Twig;

use Twig_Extension;
use Twig_SimpleFunction;

/**
 * Axstrad\Bundle\ContentBundle\Twig\Extension
 */
class Extension extends Twig_Extension
{
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction(
                'axstrad_content',
                array($this, 'axstradContent'),
                array(
                    'needs_context' => true,
                    'is_safe' => array('html'),
                )
            ),
        );
    }

    public function axstradContent($context, $content = null)
    {
        if (!isset($context['axstrad_content'])) {
            return null;
        }

        return sprintf(
            '<h1>%s</h1>%s',
            htmlspecialchars($context['axstrad_content']->getHeading()),
            $context['axstrad_content']->getCopy()
        );
    }

    public function getName()
    {
        return 'axstrad_content';
    }
}
