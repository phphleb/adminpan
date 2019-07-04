<?php

namespace Phphleb\Adminpan\Add;


class GetDataHTML
{
    public function get(string $html)
    {
        return "<div class='hl-ap-block_html' style='min-width: 100px;'><div class='hl_ap_block'>" . $html . "</div></div>";
    }
}