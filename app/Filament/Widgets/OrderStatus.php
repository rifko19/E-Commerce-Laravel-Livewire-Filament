<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use App\Models\Order;

class OrderStatus extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'orderStatus';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Order Status';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $newOrders = Order::query()->where('status', 'new')->count();
        $processingOrders = Order::query()->where('status', 'processing')->count();
        $shippedOrders = Order::query()->where('status', 'shipped')->count();
        $deliveredOrders = Order::query()->where('status', 'delivered')->count();
        $canceledOrders = Order::query()->where('status', 'canceled')->count();

        $totalOrders = $newOrders + $processingOrders + $shippedOrders + $deliveredOrders + $canceledOrders;
        $deliveredPercentage = ($deliveredOrders / $totalOrders) * 100;

        $color = $this->getColor($deliveredPercentage);

        return [
            'chart' => [
                'type' => 'radialBar',
                'height' => 380,
            ],
            'series' => [
                $deliveredPercentage,
            ],
            'plotOptions' => [
                'radialBar' => [
                    'hollow' => [
                        'size' => '50%',
                    ],
                    'track' => [
                        'background' => 'transparent',
                        'startAngle' => -135,
                        'endAngle' => 135,
                    ],
                    'dataLabels' => [
                        'show' => true,
                        'name' => [
                            'show' => true,
                        ],
                        'value' => [
                            'show' => true,
                            'fontSize' => '30px',
                        ],
                    ],
                    'startAngle' => -135,
                    'endAngle' => 135,
                ],
            ],
            'fill' => [
                'type' => 'gradient',
                'gradient' => [
                    'shade' => 'dark',
                    'type' => 'horizontal',
                    'gradientToColors' => ['#87D4F9'],
                    'stops' => [0, 100],
                ],
            ],
            'stroke' => [
                'lineCap' => 'butt',
                'width' => 1,
                'dashArray' => 10,
            ],
            'labels' => ['Delivered'],
            'colors' => [$color],
        ];
    }

    /**
     * Get color based on delivered percentage
     *
     * @param float $percentage
     * @return string
     */
    protected function getColor(float $percentage): string
    {
        if ($percentage < 50) {
            return '#FFA500'; // Orange
        } elseif ($percentage < 75) {
            return '#FFFF00'; // Yellow
        } else {
            return '#73EC8B'; // Green
        }
    }
}
