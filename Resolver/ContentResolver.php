<?php
namespace Axstrad\Bundle\ContentBundle\Resolver;

use Axstrad\Common\Util\Debug;
use Axstrad\Bundle\ContentBundle\Exception\InvalidContentReferenceException;
use Axstrad\Bundle\ContentBundle\Model\Content;
use Axstrad\Bundle\ContentBundle\Repository\ContentRepository;

/**
 * Axstrad\Bundle\ContentBundle\Resolver\ContentResolver
 */
class ContentResolver
{
    /**
     * @var Axstrad\Bundle\ContentBundle\Model\Content
     */
    protected $content = null;

    /**
     * @var ContentRepository
     */
    protected $repo;

    public function __construct(ContentRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param array|ArrayAccess $context
     * @param null|string|Content $reference
     * @return self
     * @throws InvalidContentReferenceException If $reference is not a valid
     *         content reference.
     */
    public function resolveFromContext($context, $content = null)
    {
        if ($content === null) {
            $content = isset($context['axstrad_content'])
                ? $context['axstrad_content']
                : null;
        }

        if (is_string($content)) {
            $content = $this->repo->findByReference($content)->getOrThrow(
                InvalidContentReferenceException::create($content)
            );
        }

        if ($content instanceof Content) {
            $this->content = $content;
        }

        return $this;
    }

    /**
     * @return PhpOption\Option The current Content
     */
    public function getContent()
    {
        return \PhpOption\Option::fromValue($this->content);
    }
}
