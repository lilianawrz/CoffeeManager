<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\ProductOrder;
use Carbon\Carbon;

class RecProductOrderChart
{
    protected $recProductOrder;

    public function __construct(LarapexChart $recProductOrder)
    {
        $this->recProductOrder = $recProductOrder;
    }

    public function build(): LarapexChart
    {
        $revenuePerMonth = ProductOrder::selectRaw('YEAR(orders.moment) as year, MONTH(orders.moment) as month, SUM(productOrders.price * productOrders.quantity) as total_revenue')
            ->join('orders', 'productOrders.order_id', '=', 'orders.id')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        $labels = [];
        $revenueData = [];

        foreach ($revenuePerMonth as $revenue) {
            $labels[] = Carbon::create($revenue->year, $revenue->month, 1)->format('F Y');
            $revenueData[] = $revenue->total_revenue;
        }

        return $this->recProductOrder->lineChart()
            ->setTitle('Receita dos Pedidos por Mês')
            ->setSubtitle('Evolução mensal da receita')
            ->addData('Receita', $revenueData)
            ->setXAxis($labels);
    }
}
