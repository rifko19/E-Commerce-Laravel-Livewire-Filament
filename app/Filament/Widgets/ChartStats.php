<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;

class ChartStats extends ChartWidget
{
    protected static ?string $heading = 'Total Orders - Per Month';

    protected function getData(): array
    {

        $statusData = Order::selectRaw('MONTH(created_at) as month, status, COUNT(*) as total')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month', 'status')
            ->orderBy('month')
            ->get();


        $monthlyData = [];
        $statuses = ['new', 'processing', 'shipped', 'delivered', 'cancelled'];
        foreach ($statuses as $status) {
            $monthlyData[$status] = array_fill(0, 12, 0);
        }

        foreach ($statusData as $data) {
            $monthlyData[$data->status][$data->month - 1] = $data->total;
        }

        $monthlyLabels = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        $datasets = [];
        $colors = [
            'new' => ['rgba(255, 99, 132, 0.2)', 'rgba(255, 99, 132, 1)'],
            'processing' => ['rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 1)'],
            'shipped' => ['rgba(75, 192, 192, 0.2)', 'rgba(75, 192, 192, 1)'],
            'delivered' => ['rgba(153, 102, 255, 0.2)', 'rgba(153, 102, 255, 1)'],
            'cancelled' => ['rgba(255, 159, 64, 0.2)', 'rgba(255, 159, 64, 1)']
        ];

        foreach ($statuses as $status) {
            $datasets[] = [
                'label' => ucfirst($status),
                'data' => $monthlyData[$status],
                'backgroundColor' => $colors[$status][0],
                'borderColor' => $colors[$status][1],
                'borderWidth' => 2,
                'fill' => true,
            ];
        }

        return [
            'datasets' => $datasets,
            'labels' => $monthlyLabels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
