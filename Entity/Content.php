<?php
namespace Axstrad\Bundle\ContentBundle\Entity;

use Axstrad\Component\Content\Entity\Article;
use Doctrine\ORM\Mapping as ORM;

/**
 * Axstrad\Bundle\ContentBundle\Entity\Content
 *
 * @ORM\Entity
 * @ORM\Table(name="axstrad_content")
 */
class Content extends Article
{

}
