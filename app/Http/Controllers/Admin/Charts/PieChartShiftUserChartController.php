<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Models\Shift;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

/**
 * Class PieChartShiftUserChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PieChartShiftUserChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

        // MANDATORY. Set the labels for the dataset points


        // OPTIONAL
        $this->chart->displayAxes(false);
        $this->chart->displayLegend(true);

        // MANDATORY. Set the labels for the dataset points
        $shifts = [];
        $countsineach = [];


        $var = Shift::all();
        foreach ($var as $v) {
            $shifts[] = $v->name;
            $countsineach[] = $v->requests()->count();
        }

        $this->chart->labels($shifts);
        $this->chart->dataset('Red', 'pie', $countsineach)
            ->backgroundColor([
                'rgb(70, 127, 208)',
                'rgb(66, 186, 150)',
                'rgb(96, 92, 168)',
                'rgb(255, 193, 7)',
            ]);
        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/pie-chart-shift-user'));

        // OPTIONAL
        // $this->chart->minimalist(false);
        // $this->chart->displayLegend(true);
    }

    /**
     * Respond to AJAX calls with all the chart data points.
     *
     * @return json
     */
    public function data()
    {
        // $users_created_today = \App\User::whereDate('created_at', today())->count();

        // $this->chart->dataset('Users Created', 'bar', [
        //             $users_created_today,
        //         ])
        //     ->color('rgba(205, 32, 31, 1)')
        //     ->backgroundColor('rgba(205, 32, 31, 0.4)');


    }
}
