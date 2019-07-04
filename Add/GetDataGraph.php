<?php

namespace Phphleb\Adminpan\Add;


class GetDataGraph
{
    public function get( array $x_data, array $y_data)
    {
        $max_x = max($x_data);
        $min_x = min($x_data);
        if(count(
            $x_data)>80){$width_g = "5px";
        } else {
            $width_g = round(100/count($x_data), 8) . "%";
        }
        $height_g = 300/$max_x;

        $content = "<div style='position: relative; max-width: 90%; max-height: 330px; overflow: auto' class='hl-ap-graph-over'>";
        foreach($x_data as $key => $dt){

            $max_class = $dt == $max_x ? "class='hl-ap-graph-max'" : "";
            $min_class = $dt == $min_x ? "class='hl-ap-graph-min'" : "";
            $title = " $dt" . "\n" . "x[" . $key . "]: " . count($x_data) . "\n" . "max x: " . $max_x . "\n" . "min x: " . $min_x . "\n";
            $content .= "<q0 title='$title' style='width:" . $width_g . "; height: " . ($dt*$height_g) . "px;' $max_class $min_class></q0>";

        }
        $content .= "</div>";

        return $content;
    }
}