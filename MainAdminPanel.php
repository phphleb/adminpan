<?php

namespace Phphleb\Adminpan;

use Phphleb\Adminpan\Add\{GetDataHTML, GetDataTable, GetDataList, GetDataGraph, GetDataNumericPageBtns};

class MainAdminPanel
{
    /**
     * Returns HTML
     * Возвращает HTML
     * @param string $html
     * @return string
     */
    public function getDataHTML(string $html) {
        return (new GetDataHTML)->get($html);
    }

    /**
     * Returns a responsive table.
     * Возвращает адаптивную таблицу.
     * @param array $data
     * @return string
     */
    public function getDataTable(array $data) {
        return (new GetDataTable)->get($data, []);
    }

    /**
     * Returns a responsive named table.
     * Возвращает адаптивную именованную таблицу.
     * @param array $data
     * @param array $names
     * @return string
     */
    public function getNamedTable(array $data, array $names) {
        return (new GetDataTable)->get($data, $names);
    }

    /**
     * Returns a list.
     * Возвращает список.
     * @param array $list
     * @param int $startNum
     * @return string
     */
    public function getDataList(array $list, int $startNum = 1) {
        return (new GetDataList)->get($list, $startNum);
    }

    /**
     * Returns a graph with data along the axes.
     * Возвращает график с данными по осям.
     * @param array[int] $dataX
     * @param array[int] $dataY
     * @return string
     */
    public function getDataGraph(array $dataX, array $dataY) {
        return (new GetDataGraph)->get($dataX, $dataY);
    }


    /**
     * Returns pagination data.
     * Возвращает данные пагинации.
     * @param int $pageNumber
     * @param int $limit
     * @param string $originUrl
     * @param int $allRowsCount
     * @return string
     */
    public function getNumericPageBtns(int $pageNumber, int $limit, string $originUrl, int $allRowsCount) {
        return (new GetDataNumericPageBtns)->get($pageNumber, $limit, $originUrl, $allRowsCount);
    }
}

