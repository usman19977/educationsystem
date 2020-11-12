<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Models\Criteria;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

/**
 * Class LinechartCriteriaVsUserChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LinechartCriteriaVsUserChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

        // MANDATORY. Set the labels for the dataset points
        // $this->chart->labels([
        //     'Today',
        // ]);

        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/linechart-criteria-vs-user'));

        // OPTIONAL
        // $this->chart->minimalist(false);
        // $this->chart->displayLegend(true);
        $labels = [];

        $criterias = Criteria::all();
        foreach ($criterias as $criteria) {
            $labels[] = $criteria->name;
        }
        $this->chart->labels($labels);


        $this->chart->dataset('Blue', 'line', [4, 3, 5, 1])
            ->color('rgba(70, 127, 208, 1)');
        $this->chart->dataset('Yellow', 'line', [8, 1, 4, 3])
            ->color('rgb(255, 193, 7)');
        $this->chart->dataset('Green', 'line', [1, 4, 7, 11])
            ->color('rgb(66, 186, 150)');
        $this->chart->dataset('Purple', 'line', [2, 10, 5, 3])
            ->color('rgb(96, 92, 168)');
    }

    /**
     * Respond to AJAX calls with all the chart data points.
     *
     * @return json
     */
    // public function data()
    // {
    //     $users_created_today = \App\User::whereDate('created_at', today())->count();

    //     $this->chart->dataset('Users Created', 'bar', [
    //                 $users_created_today,
    //             ])
    //         ->color('rgba(205, 32, 31, 1)')
    //         ->backgroundColor('rgba(205, 32, 31, 0.4)');
    // }
}
