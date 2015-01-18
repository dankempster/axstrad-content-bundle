<?php
namespace Axstrad\Bundle\ContentBundle\Model;

use Axstrad\Component\Content\Article;

/**
 * Axstrad\Bundle\ContentBundle\Model\Content
 */
interface Content extends
    Article
{
    /**
     * Get unique reference
     *
     * @return string
     * @see setReference
     */
    public function getReference();

    /**
     * Set unique reference
     *
     * @param string $reference
     * @return self
     * @see getReference
     */
    public function setReference($reference);
}
