<?php

namespace Phphleb\Adminpan\Add;


class GetDataNumericPageBtns
{
    public function get(int $page, int $limit, string $originUrl, int $count, string $pageName = 'Page')
    {
        return "<div class='hl-ap-block_numeric'>" . $this->create($this->getButtons($page, $limit, $originUrl, $count, $pageName)) . "</div>";
    }

    protected function create($params)
    {
        $revert = false;
        $data = '';
        $i = 1;
        foreach ($params as $key => $param) {
            if (!empty($param[2])) {
                $data .= "<span> " . $param[0] . " </span>";
                $revert = true;
            } else {
                $data .= "<a href='" . $param[1] . "'><button>" . ($revert ? '>' : '') . ($i == count($params) ? '|' : '') . ' ' . $param[0] . ' '. ($i == 1 ? '|' : '') . ($revert ? '' : '<') . "</button></a>";
            }
            $i++;
        }
        return $data;
    }

    private function getButtons($page, $limit, $originUrl, $count, $pageName)
    {
        $page = $page == 0 ? 1 : $page;
        $limit = $limit == 0 ? 1 : $limit;

        $url = $originUrl . "?limit=$limit&page=";
        $endPage = ceil($count / $limit);
        if ($endPage < 2) {
            return [];
        }
        $pagePreview = ($page - 1) == 0 ? 1 : ($page - 1);
        $pageNext = $page + 1;
        if ($endPage == 2) {
            return $this->createPage($page, $url, 2, $pageName);
        }
        if ($endPage == 3) {
            return $this->createPage($page, $url, 3, $pageName);
        }
        if ($endPage == 4) {
            return $this->createPage($page, $url, 4, $pageName);
        }
        if ($page == $endPage) {
            return [
                [1, $url . 1],
                [$pagePreview, $url . $pagePreview],
                [$pageName . ' ' . $page, $url . $page, true]
            ];
        }
        if ($page == $endPage - 1) {
            return [
                [1, $url . 1],
                [$pagePreview, $url . $pagePreview],
                [$pageName . ' ' . $page, $url . $page, true],
                [$endPage, $url . $endPage]
            ];
        }
        if ($page == 1) {
            return [
                [$pageName . ' ' . $page, $url . $page, true],
                [$pageNext, $url . $pageNext],
                [$endPage, $url . $endPage]
            ];
        }
        if ($page == 2) {
            return [
                [1, $url . 1],
                [$pageName . ' ' . $page, $url . $page, true],
                [$pageNext, $url . $pageNext],
                [$endPage, $url . $endPage]
            ];
        }
        return [
            [1, $url . 1],
            [$pagePreview, $url . $pagePreview],
            [$pageName . ' ' . $page, $url . $page, true],
            [$pageNext, $url . $pageNext],
            [$endPage, $url . $endPage]
        ];

    }

    private function createPage($page, $url, $count = 1, $pageName = 'Page')
    {
        $result = [];
        for ($i = 1; $i < $count + 1; $i++) {
            $result[] = $i === $page ? [$pageName . ' ' . $page, $url . $page, true] : [$i , $url . $i];
        }
        return $result;
    }

}

