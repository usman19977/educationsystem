<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Models\Admitcard;
use App\Models\Request;
use App\Models\School;
use App\Models\Student;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

/**
 * Class ComparisionEntiriesChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ComparisionEntiriesChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

        $labels = [];
        for ($days_backwards = 5; $days_backwards >= 0; $days_backwards--) {
            if ($days_backwards == 1) {
            }
            $labels[] = $days_backwards . ' days ago';
        }
        $this->chart->labels($labels);

        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/comparision-entiries'));

        // OPTIONAL
        $this->chart->minimalist(false);
        $this->chart->displayLegend(true);
    }

    /**
     * Respond to AJAX calls with all the chart data points.
     *
     * @return json
     */
    public function data()
    {
        for ($days_backwards = 5; $days_backwards >= 0; $days_backwards--) {
            // Could also be an array_push if using an array rather than a collection.
            $students[] = Student::whereDate('created_at', today()->subDays($days_backwards))
                ->count();
            $request[] = Request::whereDate('created_at', today()->subDays($days_backwards))
                ->count();
            $admitCard[] = Admitcard::whereDate('created_at', today()->subDays($days_backwards))
                ->count();
            $school[] = School::whereDate('created_at', today()->subDays($days_backwards))
                ->count();
        }
        $this->chart->dataset('Students', 'line', $students)
            ->color('rgb(66, 186, 150)')
            ->backgroundColor('rgba(66, 186, 150, 0.4)');

        $this->chart->dataset('Requests', 'line', $request)
            ->color('rgb(96, 92, 168)')
            ->backgroundColor('rgba(96, 92, 168, 0.4)');

        $this->chart->dataset('Admit Cards', 'line', $admitCard)
            ->color('rgb(255, 193, 7)')
            ->backgroundColor('rgba(255, 193, 7, 0.4)');

        $this->chart->dataset('Schools', 'line', $school)
            ->color('rgba(70, 127, 208, 1)')
            ->backgroundColor('rgba(70, 127, 208, 0.4)');
    }
}
