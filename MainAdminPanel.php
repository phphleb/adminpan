<?php

namespace Phphleb\Adminpan;

use Phphleb\Adminpan\Add\{GetDataHTML,GetDataTable,GetDataList, GetDataGraph, GetDataNumericPageBtns};

class MainAdminPanel
        {
            /**
             * @param string $html
             * @return string
             */
            public function getDataHTML(string $html)
        {
            return (new GetDataHTML)->get($html);
        }

            /**
             * @param array $data
             * @return string
             */
            public function getDataTable(array $data)
        {
            return (new GetDataTable)->get($data, []);
        }

            /**
             * @param array $data
             * @param array $names
             * @return string
             */
            public function getNamedTable(array $data, array $names)
        {
            return (new GetDataTable)->get($data, $names);
    }

    /**
     * @param array $list
     * @param int $start_num
     * @return string
     */
    public function getDataList(array $list, int $start_num = 1)
    {
        return (new GetDataList)->get($list, $start_num);
    }

    /**
     * @param array $data_x
     * @param array $data_y
     * @return string
     */
    public function getDataGraph(array $data_x, array $data_y)
    {
        return (new GetDataGraph)->get($data_x, $data_y);
    }

    public function getNumericPageBtns(array $params)
    {
        return (new GetDataNumericPageBtns)->get($params);
    }

}

