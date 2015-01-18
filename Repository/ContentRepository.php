<?php
namespace Axstrad\Bundle\ContentBundle\Repository;

/**
 * Axstrad\Bundle\ContentBundle\Repository\ContentRepository
 */
interface ContentRepository
{
    /**
     * @param string $reference
     * @return \PhpOption\Option
     */
    public function findByReference($reference);
}
