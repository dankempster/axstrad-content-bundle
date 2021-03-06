<?php
namespace Axstrad\Bundle\ContentBundle\Resolver;

use Axstrad\Bundle\ContentBundle\Exception\InvalidContentReferenceException;
use Axstrad\Bundle\ContentBundle\Model\Content;
use Axstrad\Bundle\ContentBundle\Repository\ContentRepository;
use PhpOption\Option;

/**
 * Axstrad\Bundle\ContentBundle\Resolver\ContentResolver
 */
class ContentResolver
{
    /**
     * @var Content
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
     * @param array|\ArrayAccess $context
     * @param null|string|Content $content
     * @return self
     * @throws InvalidContentReferenceException If $content is a string, but not
     *         a valid content reference.
     */
    public function resolveFromContext($context, $content = null)
    {
        if (null === $content) {
            $content = isset($context['axstrad_content'])
                ? $context['axstrad_content']
                : null;
        }

        if (is_string($content) &&
            (null === $this->content || $this->content->getReference() != $content)
        ) {
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
     * @return Option The current Content
     */
    public function getContent()
    {
        return Option::fromValue($this->content);
    }
}
