<?php
namespace Axstrad\Bundle\ContentBundle\Renderer;

use Axstrad\Bundle\ContentBundle\Model\Content;

/**
 * Axstrad\Bundle\ContentBundle\Renderer\ContentRenderer
 */
class ContentRenderer
{
    public function render($content)
    {
        $return = null;

        switch (true) {
            case $content instanceof Content:
                $return = $this->renderContent($content);
                break;
        }

        return $return;
    }

    public function renderContent(Content $content)
    {
        return sprintf(
            '<h1>%s</h1>%s',
            htmlspecialchars($content->getHeading()),
            $content->getCopy()
        );
    }
}
