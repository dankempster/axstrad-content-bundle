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

            new \Twig_SimpleFunction(
                'axstrad_content_heading',
                array($this, 'axstradContentHeading'),
                array(
                    'needs_context' => true,
                    'is_safe' => array('html'),
                )
            ),

            new \Twig_SimpleFunction(
                'axstrad_content_copy',
                array($this, 'axstradContentCopy'),
                array(
                    'needs_context' => true,
                    'is_safe' => array('html'),
                )
            ),
        );
    }

    public function axstradContent($context, $content = null)
    {
        $renderer = $this->renderer;

        return $this->resolver
            ->resolveFromContext($context, $content)
            ->getContent()
            ->map(function($content) use ($renderer) {
                return $this->renderer->render($content);
            })
            ->getOrElse(null)
        ;
    }

    public function axstradContentHeading($context, $content = null)
    {
        $renderer = $this->renderer;

        return $this->resolver
            ->resolveFromContext($context, $content)
            ->getContent()
            ->map(function($content) use ($renderer) {
                return $this->renderer->renderHeading($content);
            })
            ->getOrElse(null)
        ;
    }

    public function axstradContentCopy($context, $content = null)
    {
        $renderer = $this->renderer;

        return $this->resolver
            ->resolveFromContext($context, $content)
            ->getContent()
            ->map(function($content) use ($renderer) {
                return $this->renderer->renderCopy($content);
            })
            ->getOrElse(null)
        ;
    }

    public function getName()
    {
        return 'axstrad_content';
    }
}
