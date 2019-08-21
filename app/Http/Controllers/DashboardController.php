<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\auth_test;


class DashboardController extends MasterController
{

    public function index()
    {
        $key = \Session::get('access');
        $result =$this->http->ProjectStatistic($key);
        $p1 = $this->http->Projectfind(['status' => 'false']);

        $apartment_count = "--";
        $condo_count = "--";
        $borey_count = "--";


        if ($result->status_code == 200) {
            $projectEnable = $result->result->project->total_project_enable;
        } else {
            $projectEnable = "--";
        }

        if ($p1->status_code == 200) {
            $projectDisable = $result->result->project->total_project_disable;
        } else {
            $projectDisable = "--";
        }


        if ($result->status_code == 200) {
            $result = $result->result;
            $totalproject = $result->project->countries[0]->total;
            $totalEvent = $result->event->total;
            $eventEnable = $result->event->total_enable;
            $eventDisble = $result->event->total_disable;
            $admin_count = $result->user->ADMIN->total;
            $total_user = $result->user->total;
            $agent_count = $result->user->AGENT->total;
            $user_count = $result->user->USER->total;

            $property_count = $result->property->total;
            if(isset($result->property->disable->total)){
                $propertyoff_count = $result->property->disable->total;
            }else{
                $propertyoff_count = 0;
            }
            if(isset($result->property->enable->total)){
                $propertyon_count = $result->property->enable->total;
            }else{
                $propertyon_count = 0;
            }



            $apartment_count = $result->project->countries[0]->types[2]->total;
            $condo_count = $result->project->countries[0]->types[1]->total;
            $borey_count = $result->project->countries[0]->types[0]->total;
            $apartment_percent =  number_format(($apartment_count * 100) / $totalproject,2);
            $condo_percent = number_format(($condo_count*100) / $totalproject,2);
            $borey_percent =  number_format(($borey_count * 100) / $totalproject,2);
            $chart = $result->project->chart;
            $apartment_chart  = [];
            for ($i=1;$i<=12;$i++){
                $a= null;
                foreach ($chart->apartment as $item2){
                    if($item2->date==$i){
                        $a = $item2->total;
                    }

                }
                if($a!=null){
                    array_push($apartment_chart,$a);
                }else{
                    array_push($apartment_chart,0);
                }


            }
            $condo_chart  = [];
            for ($i=1;$i<=12;$i++){
                $a= null;
                foreach ($chart->condo as $item2){
                    if($item2->date==$i){
                        $a = $item2->total;
                    }

                }
                if($a!=null){
                    array_push($condo_chart,$a);
                }else{
                    array_push($condo_chart,0);
                }


            }
            $borey_chart  = [];
            for ($i=1;$i<=12;$i++){
                $a= null;
                foreach ($chart->borey as $item2){
                    if($item2->date==$i){
                        $a = $item2->total;
                    }

                }
                if($a!=null){
                    array_push($borey_chart,$a);
                }else{
                    array_push($borey_chart,0);
                }


            }



            return view('template.dashboard', compact(
                'totalproject',
                'projectDisable',
                'projectEnable',
                'totalEvent',
                'eventEnable',
                'eventDisble',
                'total_user',
                'admin_count',
                'agent_count',
                'user_count',
                'property_count',
                'propertyon_count',
                'propertyoff_count',
                'apartment_count',
                'borey_count',
                'condo_count',
                'apartment_percent',
                'condo_percent',
                'borey_percent',
                'apartment_chart',
                'condo_chart',
                'borey_chart'

            ));
        } else {
            return view('401');
        }


    }
}
