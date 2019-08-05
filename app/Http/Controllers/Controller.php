<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public  $host = "http://192.168.88.58";

    public function created_paginate($pagiate){
      $backpage = $pagiate->page-1;
      $nextpage = $pagiate->page+1;

        if($backpage<=0){
            $disable = "disabled";
        }else{
            $disable = "";
        }
        if($nextpage>$pagiate->total_page){
            $nextpage1 = "disabled";
        }else{
            $nextpage1 = "";
        }
        $result = "<ul class=\"pagination custom-pagination\">";
        $result .= '<li class="paginate_button page-item previous '.$disable.' " id="bootstrap-data-table_previous">
                    <a href="#" aria-controls="bootstrap-data-table" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                   </li>';
        if($pagiate->total_page>6){


                if($pagiate->page>=4 && $pagiate->page<$pagiate->total_page-3){

                        if($pagiate->page<$pagiate->total_page-3){
                        $result .= '<li class="paginate_button page-item ">
                                <a href="#" aria-controls="bootstrap-data-table" tabindex="1" class="page-link">1</a>
                            </li>';
                        $result .='<li class="paginate_button page-item">
                                <a href="#" aria-controls="bootstrap-data-table" class="page-link">...</a>
                            </li>';
                        $beforpage = $pagiate->page-3;
                        for ($i=$beforpage;$i<$beforpage+5;$i++){
                            $page = $i +1;
                            if($pagiate->page==$page){
                                $active = "active";
                            }else{
                                $active = "page-item-list";
                            }
                            $result .= '<li class="paginate_button page-item '.$active.'">
                                <a href="#" aria-controls="bootstrap-data-table" tabindex="'.$page.'" class="page-link">'.$page.'</a>
                            </li>';
                        }
                        $result .= '<li class="paginate_button page-item">
                                <a href="#" aria-controls="bootstrap-data-table" class="page-link">...</a>
                            </li>';
                        $result .= '<li class="paginate_button page-item">
                                <a href="#" aria-controls="bootstrap-data-table" class="page-link">'.$pagiate->total_page.'</a>
                            </li>';
                   }

                }else{$result .= '<li class="paginate_button page-item ">
                                <a href="#" aria-controls="bootstrap-data-table" tabindex="1" class="page-link">1</a>
                            </li>';
                    $result .='<li class="paginate_button page-item">
                                <a href="#" aria-controls="bootstrap-data-table" class="page-link">...</a>
                            </li>';
                    for ($i=$pagiate->total_page-4;$i<$pagiate->total_page;$i++){
                        $page = $i + 1;
                        if($pagiate->page==$page){
                            $active = "active";
                        }else{
                            $active = "page-item-list";
                        }
                        $result .= '<li class="paginate_button page-item '.$active.'">
                                <a href="#" aria-controls="bootstrap-data-table" tabindex="'.$page.'" class="page-link">'.$page.'</a>
                            </li>';
                    }

            }


        }else{
            for($i=0;$i<$pagiate->total_page;$i++){

                $page = $i + 1;
                if($pagiate->page==$page){
                    $active = "active";
                }else{
                    $active = "page-item-list";
                }
                $result .= '<li class="paginate_button page-item '.$active.'">
                                <a href="#" aria-controls="bootstrap-data-table" tabindex="'.$page.'" class="page-link">'.$page.'</a>
                            </li>';
            }
        }
      $result .= '<li class="paginate_button page-item next '.$nextpage1.'" id="bootstrap-data-table_next">
                    <a href="#" aria-controls="bootstrap-data-table" data-dt-idx="2" tabindex="0" class="page-link">Next</a>
                    </li>';
      $result .= "</ul>";
     return $result;

    }

}
