<?php

namespace App\Twig;

use App\Service\Various\Breadcrumb;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function __construct(
        public Breadcrumb $breadcrumb
    ) {
        
    }

    /**
     * @return TwigFilter[]
     */
    public function getFilters(): array
    {
        return [
            // new TwigFilter('addProtocol', [$this, 'addProtocol']),
        ];
    }

    /**
     * @return TwigFunction[]
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('getBreadcrumbItems', [$this, 'getBreadcrumbItems']),
        ];
    }

    public function getBreadcrumbItems()
    {
        return $this->breadcrumb->getItems();
    }

}