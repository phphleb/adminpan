<?php

namespace Phphleb\Adminpan\Add;


class GetDataNumericPageBtns
{
    private $template_params = [
        [1, "/1/"], // Start page
        [3, "/3/"], // Prev
        ["Page 4", "/4/"],// 4 this page
        [5, "/5/"], // Next
        [10, "/10/"] // End page
    ];

    public function get(array $params) {
        if (empty($params)) return " Should be buttons in this place. ";


        $result = "<div class='hl-ap-block_numeric'>";
        for ($i = 0; $i < count($params); $i++) {

            if (!(($i < 2 && $params[$i][1] == $params[2][1]) || ($i == 1 && $params[1][1] == $params[0][1]))) {

                $result .= ($i != 2) ? "<a href='" . $params[$i][1] . "'><button>" : "<span>";
                switch ($i) {
                    case 0:
                        $result .= "<b> " . $params[$i][0] . " |< </b>";
                        break;
                    case 1:
                        $result .= "<b> " . $params[$i][0] . " < </b>";
                        break;
                    case 2:
                        $result .= " " . $params[$i][0] . " ";
                        break;
                    case 3:
                        $result .= "<b> > " . $params[$i][0] . " </b>";
                        break;
                    case 4:
                        $result .= "<b>>| " . $params[$i][0] . " </b>";
                        break;

                }
                $result .= ($i != 2) ? "</button></a>" : "</span>";
            }

        }
        $result .= "</div>";

        return $result;
    }
}