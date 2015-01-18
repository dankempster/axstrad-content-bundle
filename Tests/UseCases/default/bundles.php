<?php

$baseBundles = include __DIR__.'/../base-bundles.php';

return array_merge($baseBundles, array(
    new Axstrad\Bundle\ContentBundle\Tests\UseCases\AppBundle\AxstradContentBundleAppBundle,
));
