<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class TruncateExtension extends AbstractExtension
{
    private $MAX_LENGTH = 1000;

    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('truncate', [$this, 'truncate']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('truncate', [$this, 'truncate']),
        ];
    }

    public function truncate($value)
    {
        if (strlen($value) > $this->MAX_LENGTH) {
            return substr($value, 0, $this->MAX_LENGTH) . '...';
        }

        return $value;
    }
}
