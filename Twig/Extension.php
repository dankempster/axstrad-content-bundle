<?php
namespace Axstrad\Bundle\ContentBundle\Twig;

use Axstrad\Bundle\ContentBundle\Resolver\ContentResolver as Resolver;
use Axstrad\Bundle\ContentBundle\Renderer\ContentRenderer as Renderer;
use Twig_Extension;
use Twig_SimpleFunction;

/**
 * Axstrad\Bundle\ContentBundle\Twig\Extension
 */
class Extension extends Twig_Extension
{
    public function __construct(Resolver $resolver, Renderer $renderer)
    {
        $this->resolver = $resolver;
        $this->renderer = $renderer;
    }

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
        $content = $this->resolver->resolveFromContext($context, $content);

        if (empty($content)) {
            return null;
        }

        return $this->renderer->render($content);
    }

    public function getName()
    {
        return 'axstrad_content';
    }
}
