<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            new Symfony\Bundle\AsseticBundle\AsseticBundle(),

            new MandarinMedien\MMMediaBundle\MMMediaBundle(),

            new MandarinMedien\MMCmfNodeBundle\MMCmfNodeBundle(),
            new MandarinMedien\MMCmfRoutingBundle\MMCmfRoutingBundle(),
            new MandarinMedien\MMCmfContentBundle\MMCmfContentBundle(),
            new MandarinMedien\MMCmfMenuBundle\MMCmfMenuBundle(),

            //new MandarinMedien\MMCmfAdminBundle\MMCmfAdminBundle(),

            new MandarinMedien\MMAdminBundle\MMAdminBundle(),

            new FOS\UserBundle\FOSUserBundle(),

            new AppBundle\AppBundle(),
            new MyAdminBundle\MyAdminBundle(),

            // fürs AdminBundle
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new MandarinMedien\MMCmf\Admin\PageAddonBundle\MMCmfAdminPageAddonBundle(),
            new MandarinMedien\MMCmf\Admin\RoutingAddonBundle\MMCmfAdminRoutingAddonBundle(),
            new MandarinMedien\MMCmf\Admin\ContentNodeAddonBundle\MMCmfAdminContentNodeAddonBundle(),
            new MandarinMedien\MMFormGroupBundle\MMFormGroupBundle()
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'), true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();

            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
        }

        return $bundles;
    }

    /**
     * @param LoaderInterface $loader
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir() . '/config/config_' . $this->getEnvironment() . '.yml');
    }

    /**
     * @return string
     */
    public function getRootDir()
    {
        return __DIR__;
    }

    /**
     * @return string
     */
    public function getCacheDir()
    {
        return dirname(__DIR__) . '/var/cache/' . $this->getEnvironment();
    }

    /**
     * @return string
     */
    public function getLogDir()
    {
        return dirname(__DIR__) . '/var/logs';
    }
}
