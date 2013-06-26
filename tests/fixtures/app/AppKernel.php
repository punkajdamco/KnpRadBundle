<?php

namespace Knp\RadBundle\tests\fixtures\app;

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Bundle\FrameworkBundle\DependencyInjection\FrameworkExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        return array(
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle,
            new \Symfony\Bundle\TwigBundle\TwigBundle,
            new \Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle,
            new \Knp\RadBundle\KnpRadBundle,
            new \Knp\RadBundle\tests\fixtures\src\App\App,
        );
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {

        return $loader->load(__DIR__.'/config.yml');

        $container = new ContainerBuilder;
        $container->getParameterBag()->add(array(
            'kernel.debug' => true,
            'kernel.bundles' => array(),
            'kernel.name' => 'app',
            'kernel.environment' => 'test',
            'kernel.cache_dir' => '',
        ));
        $extension = new FrameworkExtension;
        $extension->load(array(array(
            'secret' => 'secret',
            'csrf_protection' => array(
                'enabled' => true
            ),
            'router' => array('resource' => null ),
            'validation' =>    array( 'enabled' => true, 'enable_annotations' => true ),
            'form' => null,
            'test' => null,
            'default_locale' => 'en',
            'session' => array(
                'storage_id' =>     'session.storage.mock_file'
            )
        )), $container);

        return $container;
    }

    public function getCacheDir()
    {
        return sys_get_temp_dir().'/KnpRadBundle/cache';
    }

    public function getLogDir()
    {
        return sys_get_temp_dir().'/KnpRadBundle/logs';
    }
}
