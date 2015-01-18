<?php
namespace Axstrad\Bundle\ContentBundle\Resolver;

/**
 * Axstrad\Bundle\ContentBundle\Resolver\ContentResolver
 */
class ContentResolver
{
    public function resolveFromContext($context, $reference = null)
    {
        return isset($context['axstrad_content'])
            ? $context['axstrad_content']
            : null;
    }
}
