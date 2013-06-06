<?php

namespace Symfony\Cmf\Bundle\CoreBundle\Tests\Unit\Twig;

use Symfony\Bundle\FrameworkBundle\Tests\Functional\WebTestCase;
use Symfony\Cmf\Bundle\CoreBundle\Twig\TwigExtension;

class TwigExtensionHierarchyTest extends WebTestCase
{
    private $pwc;
    private $managerRegistry;
    private $manager;
    private $uow;
    private $extension;

    public function setUp()
    {
        $kernel = $this->createKernel(array('test_case' => 'test'));
        $kernel->boot();

        $container = $kernel->getContainer();
        $managerRegistry = $container->get('doctrine_phpcr');
        $session = $managerRegistry->geConnection();
        $root = $session->getRootNode();
        $a = $root->addNode('a');
        $b = $a->addNode('b');
        $c = $b->addNode('c');
        $d = $b->addNode('d');
        $e = $b->addNode('e');
        $f = $a->addNode('f');
        $g = $f->addNode('g');
        $h = $g->addNode('h');

        $session->save();

        $this->pwc = $this->getMock('Symfony\Cmf\Bundle\CoreBundle\PublishWorkflow\PublishWorkflowCheckerInterface');

        $this->extension = new TwigExtension($this->pwc, $managerRegistry, 'foo');

    }

    public function testGetDescendants()
    {
        $this->assertEquals(array(), $this->extension->getDescendants(null));

        $this->markTestIncomplete('TODO: write test');
    }

    public function testGetPrev()
    {
        $this->assertNull($this->extension->getPrev(null));

        $this->markTestIncomplete('TODO: write test');
    }

    public function testGetNext()
    {
        $this->assertNull($this->extension->getNext(null));

        $this->markTestIncomplete('TODO: write test');
    }

    public function testGetPrevLinkable()
    {
        $this->assertNull($this->extension->getPrevLinkable(null));

        $this->markTestIncomplete('TODO: write test');
    }

    public function testGetNextLinkable()
    {
        $this->assertNull($this->extension->getNextLinkable(null));

        $this->markTestIncomplete('TODO: write test');
    }
}
