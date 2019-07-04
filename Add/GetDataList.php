<?php

namespace Phphleb\Adminpan\Add;


class GetDataList
{
    public function get(array $list, int $start_num){

        $data = "<table class='hl-ap-over-listing'>";
        $a = $start_num;
        foreach ($list as $str){
            $data .= " <tr><td class='hl-ap-list-num' >$a</td><td>" . $str . "</td></tr>";
            $a++;
        }
        $data .= "</table>";

        return $data;
    }
}