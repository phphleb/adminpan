<?php

namespace Phphleb\Adminpan;

use Phphleb\Adminpan\Add\{GetDataHTML, GetDataTable, GetDataList, GetDataGraph, GetDataNumericPageBtns};

class MainAdminPanel
{
    /**
     * @param string $html
     * @return string
     */
    public function getDataHTML(string $html) {
        return (new GetDataHTML)->get($html);
    }

    /**
     * @param array $data
     * @return string
     */
    public function getDataTable(array $data) {
        return (new GetDataTable)->get($data, []);
    }

    /**
     * @param array $data
     * @param array $names
     * @return string
     */
    public function getNamedTable(array $data, array $names) {
        return (new GetDataTable)->get($data, $names);
    }

    /**
     * @param array $list
     * @param int $startNum
     * @return string
     */
    public function getDataList(array $list, int $startNum = 1) {
        return (new GetDataList)->get($list, $startNum);
    }

    /**
     * @param array $dataX
     * @param array $dataY
     * @return string
     */
    public function getDataGraph(array $dataX, array $dataY) {
        return (new GetDataGraph)->get($dataX, $dataY);
    }


    /**
     * @param int $page
     * @param int $limit
     * @param string $originUrl
     * @param int $count
     * @param array $urlParams
     * @param string $translatePage
     * @return string
     */
    public function getNumericPageBtns(int $page, int $limit, string $originUrl, int $count, array $urlParams = [], string $translatePage = 'Page') {
        return (new GetDataNumericPageBtns)->get($page, $limit, $originUrl, $count, $urlParams, $translatePage);
    }
}

