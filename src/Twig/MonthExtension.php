<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class MonthExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('monthDate', [$this, 'toMonthDate']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('monthDate', [$this, 'toMonthDate']),
        ];
    }

    public function toMonthDate(\DateTime $value)
    {

        return $this->toFrenchMonth($value->format('m')) . ' ' . $value->format('Y');
    }

    private function toFrenchMonth($month)
    {
        $result=null;

        switch ($month) {
            case '01':
                {
                    $result = 'Janvier';
                    break;
                }
            case '02':
                {
                    $result = 'Février';
                    break;
                }
            case '03':
                {
                    $result = 'Mars';
                    break;
                }
            case '04':
                {
                    $result = 'Avril';
                    break;
                }
            case '05':
                {
                    $result = 'Mai';
                    break;
                }
            case '06':
                {
                    $result = 'Juin';
                    break;
                }
            case '07':
                {
                    $result = 'Juillet';
                    break;
                }
            case '08':
                {
                    $result = 'Août';
                    break;
                }
            case '09':
                {
                    $result = 'Septembre';
                    break;
                }
            case '10':
                {
                    $result = 'Octobre';
                    break;
                }
            case '11':
                {
                    $result = 'Novembre';
                    break;
                }
            case '12':
                {
                    $result = 'Décembre';
                    break;
                }
        }

        return $result;
    }
}
