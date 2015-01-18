<?php

namespace Axstrad\Bundle\ContentBundle\Tests\Functional;

use Axstrad\Bundle\UseCaseTestBundle\Test\UseCaseTestTrait;
use Liip\FunctionalTestBundle\Test\WebTestCase;

/**
 * This testcase test the use of the
 *
 * @IgnoreAnnotation("dataProvider")
 */
class DefaultTest extends WebTestCase
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
            [ '/axstrad_content/by-entity/my-content' ],
        );
    }

    /**
     * @dataProvider urlProvider
     */
    public function testResponseContainsContentHeading($url)
    {
        $crawler = $this->client->request('GET', $url);
        $this->assertTrue(
            $crawler->filter('h1:contains("My Content")')->count() > 0
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
