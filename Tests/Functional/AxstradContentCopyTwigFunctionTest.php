<?php

namespace Axstrad\Bundle\ContentBundle\Tests\Functional;

use Axstrad\Bundle\UseCaseTestBundle\Test\UseCaseTestTrait;
use Liip\FunctionalTestBundle\Test\WebTestCase;

/**
 * This testcase test the use of the
 *
 * @IgnoreAnnotation("dataProvider")
 */
class AxstradContentCopyTwigFunctionTest extends WebTestCase
{
    use UseCaseTestTrait;

    protected static $useCase = 'default';

    protected $client;

    public function setUp()
    {
        $this->loadFixtures(array(
            'Axstrad\Bundle\ContentBundle\Tests\UseCases\AppBundle\DataFixtures\ORM\LoadContentData',
        ));

        $this->client = static::createClient();
    }

    // public function tearDown()
    // {
    //     echo $this->client->getResponse()->getContent();
    // }

    public function urlProvider()
    {
        return array(
            [ '/axstrad_content_copy/by-entity/my-content/no-arg' ],
            [ '/axstrad_content_copy/by-entity/my-content/as-arg' ],

            [ '/axstrad_content_copy/by-reference/my-content/no-arg' ],
            [ '/axstrad_content_copy/by-reference/my-content/as-arg' ],
        );
    }

    /**
     * @dataProvider urlProvider
     */
    public function testResponseContainsContentCopy($url)
    {
        $crawler = $this->client->request('GET', $url);
        $this->assertTrue(
            $crawler->filter('p:contains("My content\'s copy")')->count() > 0
        );
    }
}
