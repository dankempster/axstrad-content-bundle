<?php
namespace Axstrad\Bundle\ContentBundle\Renderer;

use Axstrad\Component\Content\Article;

/**
 * Axstrad\Bundle\ContentBundle\Renderer\ContentRenderer
 */
class ContentRenderer
{
    public function render($content)
    {
        $return = null;

        switch (true) {
            case $content instanceof Article:
                $return = $this->renderContent($content);
                break;
        }

        return $return;
    }

    public function renderContent(Article $article)
    {
        return sprintf(
            '<h1>%s</h1>%s',
            htmlspecialchars($article->getHeading()),
            $article->getCopy()
        );
    }

    public function renderHeading(Article $article)
    {
        return sprintf(
            '<h1>%s</h1>',
            htmlspecialchars($article->getHeading())
        );
    }
}
