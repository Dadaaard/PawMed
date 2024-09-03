<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    //

    public function index()
    {
        $UsersPerMonth = [
            'chart_title' => 'Monthly Customers',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' =>  'month',
            'chart_type' => 'line',
            'filter_field' => 'created_at',
            'filter_days' => 30, // show only last 30 days
            'where_raw'=> 'usertype = '. "'Customer'",
        ];

        $IncomePerDay = [
        'chart_title' => 'Daily Income',
        'report_type' => 'group_by_date',
        'model' => 'App\Models\Transaction',
        'group_by_field' => 'created_at',
        'group_by_period' => 'day',
        'aggregate_function' => 'sum',
        'aggregate_field' => 'Total',
        'chart_type' => 'line',
        ];
        

        $IncomePerMonth = [
            'chart_title' => 'Montly Income',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Transaction',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'Total',
            'chart_type' => 'line',
        ];

        $AnnualIncome = [
                'chart_title' => 'Annual Income',
                'report_type' => 'group_by_date',
                'model' => 'App\Models\Transaction',
                'group_by_field' => 'created_at',
                'group_by_period' => 'year',
                'aggregate_function' => 'sum',
                'aggregate_field' => 'Total',
                'chart_type' => 'line',
        ]; 
    
        $chart1 = new LaravelChart($UsersPerMonth);
        $chart2 = new LaravelChart($IncomePerDay);
        $chart3 = new LaravelChart($IncomePerMonth);
        $chart4 = new LaravelChart($AnnualIncome);

        $transactions = $this-> TotalTransaction();
        $Customers = $this-> TotalCustomer();



        return view('Analytics',compact('chart1','chart2','chart3','chart4','transactions','Customers'));
    }

    public function TotalTransaction(){
        $data = Transaction::count();
        return $data;
    }

    public function TotalCustomer(){
        $customer = DB::table('users')->where('usertype', 'Customer')->count();
        return $customer;
    }
}
