<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\CarouselContentNode;
use AppBundle\Entity\TileContentNode;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MandarinMedien\MMCmfContentBundle\Entity\ContainerContentNode;
use MandarinMedien\MMCmfContentBundle\Entity\ContentNode;
use MandarinMedien\MMCmfContentBundle\Entity\Page;
use MandarinMedien\MMCmfContentBundle\Entity\ParagraphContentNode;
use MandarinMedien\MMCmfContentBundle\Entity\RowContentNode;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class LoadContentNodeData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $page = $this->getReference('main-start-page');


        /**
         * CarouselContentNode
         */
        $carouselContainerContentNode = new CarouselContentNode();
        $carouselContainerContentNode->setVisible(true);
        $carouselContainerContentNode->setFluid(true);
        $carouselContainerContentNode->setPosition(0);
        $carouselContainerContentNode->setName('CarouselContentNode');
        $carouselContainerContentNode->setParent($page);

        $manager->persist($carouselContainerContentNode);


        $carouselItem = new TileContentNode();
        $carouselItem->setVisible(true);
        $carouselItem->setName('carouselItem Sushi1');
        $carouselItem->setPosition(0);
        $carouselItem->setHeadlineType('h3');
        $carouselItem->setHeadline('Nigiri-Sushi');
        $carouselItem->setLink('https://www.wikiwand.com/de/Sushi#/Nigiri-Sushi');
        $carouselItem->setImageSource('http://image.shutterstock.com/z/stock-vector-vector-sushi-cartoon-character-illustration-265064702.jpg');
        $carouselItem->setParent($carouselContainerContentNode);

        $manager->persist($carouselItem);


        $carouselItem2 = new TileContentNode();
        $carouselItem2->setVisible(true);
        $carouselItem2->setName('carouselItem Sushi2');
        $carouselItem2->setPosition(0);
        $carouselItem2->setHeadlineType('h3');
        $carouselItem2->setHeadline('Maki-Sushi');
        $carouselItem2->setLink('https://www.wikiwand.com/de/Sushi#/Maki-Sushi');
        $carouselItem2->setImageSource('http://image.shutterstock.com/z/stock-vector-vector-sushi-cartoon-character-illustration-salmonmaki-means-salmon-roll-chinese-word-means-sushi-268839578.jpg');
        $carouselItem2->setParent($carouselContainerContentNode);

        $manager->persist($carouselItem2);

        $carouselItem3 = new TileContentNode();
        $carouselItem3->setVisible(true);
        $carouselItem3->setName('carouselItem Sushi3');
        $carouselItem3->setPosition(0);
        $carouselItem3->setHeadlineType('h3');
        $carouselItem3->setHeadline('Gunkanmaki-Sushi');
        $carouselItem3->setLink('https://www.wikiwand.com/de/Sushi#/Gunkanmaki-Sushi');
        $carouselItem3->setImageSource('http://image.shutterstock.com/z/stock-vector-vector-sushi-cartoon-character-illustration-inari-means-sweet-fried-tofu-filled-with-rice-chinese-291183122.jpg');
        $carouselItem3->setParent($carouselContainerContentNode);

        $manager->persist($carouselItem3);


        /**
         * 2. ContainerContentNode
         */
        $tileContainerContentNode = new ContainerContentNode();
        $tileContainerContentNode->setVisible(true);
        $tileContainerContentNode->setClasses('beige-bg marketing');
        $tileContainerContentNode->setFluid(true);
        $tileContainerContentNode->setName('TileContainer');
        $tileContainerContentNode->setParent($page);

        $manager->persist($tileContainerContentNode);


        $tileRowContentNode = new RowContentNode();
        $tileRowContentNode->setName('TilesRow');
        $tileRowContentNode->setVisible(true);
        $tileRowContentNode->setParent($tileContainerContentNode);

        $manager->persist($tileRowContentNode);


        $tile1 = new TileContentNode();
        $tile1->setVisible(true);
        $tile1->setName('Sushi1');
        $tile1->setPosition(0);
        $tile1->setHeadlineType('h3');
        $tile1->setHeadline('Nigiri-Sushi');
        $tile1->setLink('https://www.wikiwand.com/de/Sushi#/Nigiri-Sushi');
        $tile1->setImageSource('http://image.shutterstock.com/z/stock-vector-vector-sushi-cartoon-character-illustration-265064702.jpg');
        $tile1->setParent($tileRowContentNode);
        $tile1->setClasses('col-xs-12 col-sm-4');
        $manager->persist($tile1);

        $tile2 = new TileContentNode();
        $tile2->setVisible(true);
        $tile2->setName('Sushi2');
        $tile2->setPosition(0);
        $tile2->setHeadlineType('h3');
        $tile2->setHeadline('Maki-Sushi');
        $tile2->setLink('https://www.wikiwand.com/de/Sushi#/Maki-Sushi');
        $tile2->setImageSource('http://image.shutterstock.com/z/stock-vector-vector-sushi-cartoon-character-illustration-salmonmaki-means-salmon-roll-chinese-word-means-sushi-268839578.jpg');
        $tile2->setParent($tileRowContentNode);
        $tile2->setClasses('col-xs-12 col-sm-4');
        $manager->persist($tile2);

        $tile3 = new TileContentNode();
        $tile3->setVisible(true);
        $tile3->setName('Sushi3');
        $tile3->setPosition(0);
        $tile3->setHeadlineType('h3');
        $tile3->setHeadline('Gunkanmaki-Sushi');
        $tile3->setLink('https://www.wikiwand.com/de/Sushi#/Gunkanmaki-Sushi');
        $tile3->setImageSource('http://image.shutterstock.com/z/stock-vector-vector-sushi-cartoon-character-illustration-inari-means-sweet-fried-tofu-filled-with-rice-chinese-291183122.jpg');
        $tile3->setParent($tileRowContentNode);
        $tile3->setClasses('col-xs-12 col-sm-4');
        $manager->persist($tile3);


        $manager->persist($page);

        $manager->flush();
    }

    public function getOrder()
    {
        return 10; // the order in which fixtures will be loaded
    }
}
