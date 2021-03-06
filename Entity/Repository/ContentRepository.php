<?php
namespace Axstrad\Bundle\ContentBundle\Entity\Repository;

use Axstrad\Bundle\ContentBundle\Repository\ContentRepository as ContentRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use PhpOption\Option as PhpOption;

/**
 * Axstrad\Bundle\ContentBundle\Entity\Repository\ContentRepository
 */
class ContentRepository extends EntityRepository implements
    ContentRepositoryInterface
{
    /**
     * @param string $reference
     * @return \Axstrad\Bundle\ContentBundle\Entity\Content
     * @uses findOneBy
     */
    public function findByReference($reference)
    {
        return PhpOption::fromValue(
            $this->findOneBy(array('reference' => $reference))
        );
    }
}
