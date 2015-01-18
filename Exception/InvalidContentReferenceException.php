<?php
namespace Axstrad\Bundle\ContentBundle\Exception;

/**
 * Axstrad\Bundle\ContentBundle\Exception\InvalidContentReferenceException
 */
class InvalidContentReferenceException extends OutOfBoundsException
{
    public static function create($reference, $code = null, \Exception $previous = null)
    {
        return new self(
            sprintf("There is no content with the reference '%s'", $reference),
            $code,
            $previous
        );
    }
}
