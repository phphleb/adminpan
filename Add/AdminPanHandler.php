<?php

namespace Phphleb\Adminpan\Add;

class AdminPanHandler
{
    protected $actual_name;

    protected $actual_id;

    protected $all_data;

    protected $menu_cont;
    
    public function getLang() {
        return AdminPanData::getLang();
    }

    public function getLogo() {
        return AdminPanData::getLogo();
    }

    public function getColor() {
        return AdminPanData::getColor();
    }

    public function getLink() {
        $link = AdminPanData::getLink();
        return !empty($link) ? ["url" => $link["url"], "name" => AdminPanData::i18n($link["name"])] : null;
    }

    public function getHeader($num, $all_menu)
    {
        $this->setAсtualData($num, $all_menu);

        $this->create_menu();

        return $this->create_panel();
    }

    public function getFooter()
    {
        return file_get_contents(__DIR__ . "/footer.htm");
    }

    private function setAсtualData($num, $all_blocks)
    {
        $result = [];

        foreach ($all_blocks as $key => $block) {

            $url = "";

            foreach ($block["actions"] as $action) {

                $mat = [];
                if (isset($action["prefix"])) {
                    $url = $this->compound_url([$url, $action["prefix"]]);
                }
            }
            $url = hleb_a1a3b6di245ea_getStandardUrl($this->compound_url([$url, $block["data_path"] ?? ""]));

            foreach ($block["actions"] as $action) {
                if (isset($action["adminPanController"])) {
                    $data = $action["adminPanController"];
                    $name = is_array($data[2]) ? $data[2] : [$data[2]];

                    foreach($name as $index =>$value){
                        $name[$index] = AdminPanData::i18n($value);
                    }

                    // Актуальный блок
                    if ($block["number"] == $num) {
                        $this->actual_name = implode(" : ",  $name);
                        $this->actual_id = $block["number"];
                    }
                    $result[$block["number"]] = ["name" =>  $name, "url" => $url];
                }
            }

        }
        $this->all_data = $result;
    }

    private function compound_url($strokes)
    {
        foreach ($strokes as &$stroke) {
            $stroke = str_replace("//", "/", trim($stroke, "/ \\"));
        }
        return implode('/', $strokes);

    }

    private function create_panel()
    {
        ob_start();
        include __DIR__ . "/header.php";
        $out_data = ob_get_contents();
        ob_end_clean();
        return $out_data;
    }

    private function create_menu()
    {
        $this->menu_cont = $this->get_menu_structure($this->all_data);
    }

    private function get_menu_structure($menu_blocks)
    {
        $item = "";
        $buttons = [];
        $btn_all = [];
        foreach ($menu_blocks as $key => $menu_block) {
            if (count($menu_block["name"]) > 1 && !in_array($menu_block["name"][0], $buttons)) $buttons[] = $menu_block["name"][0];
        }

        foreach ($menu_blocks as $key => $block) {

            if (count($block["name"]) == 1 && !in_array($block["name"][0], $buttons)) {
                $item .= $this->hl_create_single_block($key, $block["name"][0], $block["url"]);
            } else {
                if (!in_array($block["name"][0], $btn_all)) {
                    $bl_content = "";
                    $bl_search_display = "none";
                    foreach ($menu_blocks as $k => $bl) {
                        if (count($bl["name"]) == 2 && !in_array($bl["name"][0], $btn_all) && $bl["name"][0] == $block["name"][0]) {
                            $bl_content .= $this->hl_create_single_block($k, $bl["name"][1], $bl["url"], "-hl-ap-btn-link");
                            if ($k == $this->actual_id) $bl_search_display = "block";
                        }
                    }
                    $item .= "<div class='hl-ap-link-str' onclick='" . $this->get_js_handler($key) .  "'>" .
                    "<div class='hl-ap-block-bottom'></div><div class='hl-ap-menu-block-link -hl-ap-btn-title-link'>" .
                        "<a>" . $block["name"][0] . "</a></div></div>" .
                        "<div class='hl-ap-select-blocks' id='hl-ap-menu--" . md5($key) . "' style='display: " . $bl_search_display . "'>";
                    $item .= $bl_content;
                    $btn_all[] = $block["name"][0];
                    $item .= "</div>";
                }
            }
        }

        return $item;
    }

    function hl_create_single_block($key, $name, $url, $class = "")
    {
        $item = "";
        if ($key == $this->actual_id) {
            $item .= "<div class='hl-ap-menu-block $class'>";
            $item .= AdminPanData::i18n($name);
        } else {
            $item .= "<div class='hl-ap-menu-block-link $class'>";
            $item .= "<a href='/" . $url . "'>" . AdminPanData::i18n($name) . "</a>";
        }
        $item .= "</div>";
        return $item;
    }

    function get_js_handler($key){

        return "var hldoc = document.getElementById(\"hl-ap-menu--" . md5($key) . "\"); if(hldoc.style.display == \"none\"){hldoc.style.display = \"block\"}  else {hldoc.style.display = \"none\"};";

    }
}

