<?php
namespace Axstrad\Bundle\ContentBundle\Entity;

use Axstrad\Bundle\ContentBundle\Model\Content as ContentInterface;
use Axstrad\Common\Entity\IdTrait;
use Axstrad\Component\Content\Entity\Article;
use Doctrine\ORM\Mapping as ORM;

/**
 * Axstrad\Bundle\ContentBundle\Entity\Content
 *
 * @ORM\Entity(repositoryClass="Axstrad\Bundle\ContentBundle\Entity\Repository\ContentRepository")
 * @ORM\Table(name="axstrad_content")
 */
class Content extends Article implements
    ContentInterface
{
    use IdTrait;

    /**
     * @ORM\Column(name="reference", type="string", length=255, unique=true)
     * @var string
     */
    protected $reference;

    /**
     * Get reference
     *
     * @return string
     * @see setReference
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set reference
     *
     * @param  string $reference
     * @return self
     * @see getReference
     */
    public function setReference($reference)
    {
        $this->reference = (string) $reference;
        return $this;
    }
}
