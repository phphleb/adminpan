<?php

namespace Phphleb\Adminpan\Add;


class GetDataNumericPageBtns
{
    /**
     * Implementing pagination.
     * @param int $page - сurrent page number.
     * @param int $limit - Limit on line output.
     * @param string $originUrl - url to go without GET-parameters.
     * @param int $count - total number of lines.
     * @param array $urlParams - additional GET-parameters.
     * @param string $pageName - name itself instead of "Page".
     * @return string
     */
    public function get(int $page, int $limit, string $originUrl, int $count, array $urlParams = [], string $pageName = 'Page')
    {
        return "<div class='hl-ap-block_numeric'>" . $this->create($this->getButtons($page, $limit, $originUrl, $count, $pageName, $urlParams)) . "</div>";
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

    private function getButtons($page, $limit, $originUrl, $count, $pageName, $urlParts = [])
    {
        $page = $page == 0 ? 1 : $page;
        $limit = $limit == 0 ? 1 : $limit;

        $urlParts = ['limit' => $limit] + $urlParts;

        $url = $originUrl . "?";
        $endPage = ceil($count / $limit);
        if ($endPage < 2) {
            return [];
        }
        $pagePreview = ($page - 1) == 0 ? 1 : ($page - 1);
        $pageNext = $page + 1;
        if ($endPage == 2) {
            return $this->createPage($page, $url, $urlParts, 2, $pageName);
        }
        if ($endPage == 3) {
            return $this->createPage($page, $url, $urlParts, 3, $pageName);
        }
        if ($endPage == 4) {
            return $this->createPage($page, $url, $urlParts, 4, $pageName);
        }
        if ($page == $endPage) {
            return [
                [1, $url . http_build_query(['page' => 1] + $urlParts)],
                [$pagePreview, $url . http_build_query(['page' => $pagePreview] + $urlParts) ],
                [$pageName . ' ' . $page, $url . http_build_query(['page' => $page] + $urlParts), true]
            ];
        }
        if ($page == $endPage - 1) {
            return [
                [1, $url . http_build_query(['page' => 1] + $urlParts)],
                [$pagePreview, $url . http_build_query(['page' => $pagePreview] + $urlParts)],
                [$pageName . ' ' . $page, $url . http_build_query(['page' => $page] + $urlParts), true],
                [$endPage, $url . http_build_query(['page' => $endPage] + $urlParts)]
            ];
        }
        if ($page == 1) {
            return [
                [$pageName . ' ' . $page, $url . http_build_query(['page' => $page] + $urlParts), true],
                [$pageNext, $url . http_build_query(['page' => $pageNext] + $urlParts)],
                [$endPage, $url . http_build_query(['page' => $endPage] + $urlParts)]
            ];
        }
        if ($page == 2) {
            return [
                [1, $url . http_build_query(['page' => 1] + $urlParts)],
                [$pageName . ' ' . $page, $url . http_build_query(['page' => $page] + $urlParts), true],
                [$pageNext, $url . http_build_query(['page' => $pageNext] + $urlParts)],
                [$endPage, $url . http_build_query(['page' => $endPage] + $urlParts)]
            ];
        }
        return [
            [1, $url . http_build_query(['page' => 1] + $urlParts)],
            [$pagePreview, $url . http_build_query(['page' => $pagePreview] + $urlParts)],
            [$pageName . ' ' . $page, $url . http_build_query(['page' => $page] + $urlParts), true],
            [$pageNext, $url . http_build_query(['page' => $pageNext] + $urlParts)],
            [$endPage, $url . http_build_query(['page' => $endPage] + $urlParts)]
        ];

    }

    private function createPage($page, $url, array $urlParts, $count = 1, string $pageName = 'Page')
    {
        $result = [];
        for ($i = 1; $i < $count + 1; $i++) {
            if($i === $page) {
                $urlParts = ['page' => $page] + $urlParts;
                $result[] = [$pageName . ' ' . $page, $url . http_build_query($urlParts), true];
            } else {
                $urlParts = ['page' => $i] + $urlParts;
                $result[] = [$i, $url . http_build_query($urlParts)];
            }
        }
        return $result;
    }

}

