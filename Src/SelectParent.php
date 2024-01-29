<?php

declare(strict_types=1);

namespace Phphleb\Adminpan\Src;

use Hleb\Static\Request;

final class SelectParent
{
    private bool $searchCurrent = false;

    private array $breadcrumbs = [];

    private array $translated = [];

    public function __construct(
        private array           $data,
        private readonly string $lang,
    )
    {
    }

    public function getUpdated(): array
    {
        $this->update($this->data);

        return $this->data;
    }

    public function getTrans(): array
    {
       return $this->translated;
    }

    public function getBreadcrumbs(): array
    {
        return array_reverse($this->breadcrumbs);
    }

    /**
     * Convert the menu map according to the current page.
     *
     * Преобразование карты меню согласно текущей странице.
     */
    private function update(array &$blocks, int $level = 0): array
    {
        $level++;
        $search = false;
        $firstSearch = false;
        foreach ($blocks as &$block) {
            if ($this->searchCurrent) {
                break;
            }
            if ($level === 1) {
                $this->breadcrumbs = [];
            }
            if (isset($block['section'])) {
                [$search, $first] = $this->update($block['section'], $level);
                if ($search) {
                    if (isset($block['name'])) {
                        $this->breadcrumbs[] = $block['name'][$this->lang];
                    }
                    $search = $block['open'] = true;
                    if ($first) {
                        $search = $block['selected'] = true;
                    }
                }
            } else {
                if ((isset($block['route']) && $block['route'] === route_name()) || (isset($block['link']) &&
                        \trim(Request::getUri()->getPath(), '/') === \trim($block['link'], '/'))
                ) {
                    $search = $block['current'] = true;
                    $firstSearch = true;
                    $this->searchCurrent = true;
                    $this->breadcrumbs[] = $block['name'][$this->lang];
                    $this->translated = \array_keys($block['name']);
                }
            }
        }
        return [$search, $firstSearch];
    }
}