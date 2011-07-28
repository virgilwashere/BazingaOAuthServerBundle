<?php

namespace Bazinga\OAuthBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * BazingaOAuthBundle configuration structure.
 *
 * @package     BazingaOAuthBundle
 * @subpackage  DependencyInjection
 * @author William DURAND <william.durand1@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('bazinga_o_auth');

        $this->addDefaultSection($rootNode);
        $this->addServiceSection($rootNode);

        return $treeBuilder;
    }

    private function addDefaultSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->booleanNode('enable_xauth')->defaultValue(false)->end()
            ->end();
    }

    private function addServiceSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('service')
                    ->useAttributeAsKey('key')
                    ->prototype('scalar')->end()
            ->end();
    }
}
