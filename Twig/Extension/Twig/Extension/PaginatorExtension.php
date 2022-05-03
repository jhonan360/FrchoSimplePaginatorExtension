<?php

namespace Frcho\SimplePaginatorBundle\Twig\Extension;

use
    Frcho\SimplePaginatorBundle\Templating\Helper\PaginatorHelper,
    Frcho\SimplePaginatorBundle\Paginator\Paginator as Paginator,
    Twig\Extension\AbstractExtension,
    Twig\TwigFunction
;


class PaginatorExtension extends AbstractExtension
{

    /**
     *  @var  $pagebar
     */
    protected $pagebar;

    /**
     *  @param Frcho\SimplePaginatorBundle\Templating\Helper\PaginatorHelper $pagebar
     */
    public function __construct(PaginatorHelper $pagebar)
    {
        $this->pagebar = $pagebar;
    }

    /**
     *  @return array
     *  @see \Twig_Extension
     */
    public function getFunctions()
    {
        return array(
            new TwigFunction('simple_paginator_render', array($this, 'renderView'), array('is_safe' => array('html'), 'needs_environment' => true))
        );
        /*return array(
            'simple_paginator_render' => new \Twig_SimpleFunction('renderView', array($this, 'renderView'), array('is_safe' => array('html')))
        );*/
    }

    /**
     *  Renders the paginator
     *
     *  @param string $route
     *  @param string $id
     *  @param array $options
     *  @param string $view
     *  @return string
     */
    public function renderView($route, $id = null, $options = array(), $view = null)
    {
        return $this->pagebar->render($route, $id, $options, $view);
    }

    /**
     *  @return string
     */
    public function getName()
    {
        return 'simple_paginator_extension';
    }

}

