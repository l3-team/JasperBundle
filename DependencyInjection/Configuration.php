<?php

namespace l3\JasperBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('l3_jasper');
        
        $rootNode
             ->children()
             ->scalarNode('host')->defaultNull('http://jasper-report.univ-lille3.fr:8080')->end()
             ->scalarNode('user')->defaultNull()->end()
             ->scalarNode('password')->defaultNull()->end()
        ;

        return $treeBuilder;
    }
}
