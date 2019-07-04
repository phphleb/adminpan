<?php

namespace Phphleb\Adminpan\Add;


class GetDataTable
{
    public function get(array $data, array $names)
    {
        if(empty($names)) $names = $this->calculate_title($data);
        array_unshift( $data, $names );
        $cont = "<div class='hl_ap_over_table'><table class='hl-ap-simple-table' cellpadding='0' cellspacing='0' border='0'>";
        $tag = "th";
        $a = 0;
        foreach ($data as $a => $tr){
            $cont .= "<tr class='"  .  (!($a & 1)  ? "" : "hl-ap-second-line") .  "'>";
            foreach($tr as $str) {
                $cont .= "<$tag><div>" . $str . "</div></$tag>";
            }
            $cont .= "</tr>";
            $tag = "td";
            $a++;
        }
        $cont .= "</table></div>";

        return $cont;
    }

    public function calculate_title(array $data){

        $title = [];
        foreach($data as $key => $dt){
            $num = 0;
            foreach($dt as $k => $d){
                $title[$num] = $k;
                $num++;
            }
        }

        return $title;

    }
}