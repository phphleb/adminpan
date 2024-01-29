<?php

declare(strict_types=1);

namespace Phphleb\Adminpan\Src;

use Hleb\Http404NotFoundException;

/**
 * HTML code generation for the menu list.
 *
 * Генерация HTML-кода для списка меню.
 */
final readonly class PanelMenu
{
    public function __construct(
        private array $configMenu,
        private string $lang = 'en'
    )
    {
    }

    public function getHtml(): string
    {
        return $this->createBlock($this->configMenu);
    }

    private function createBlock(array $data): string
    {
        if (isset($data['section'])) {
            return $this->createSection($data);
        }
        if (isset($data['name'])) {
            return $this->createRow($data);
        }
        $blocks = '';
        foreach ($data as $block) {
            $blocks .= $this->createBlock($block);
        }
        return $blocks;
    }

    private function createSection(array $data): string
    {
        $content = $this->createBlock($data['section']);
        $name = $this->getName($data);
        if (!$name) {
            throw new Http404NotFoundException();
        }
        $open = empty($data['open']) ? '' : ' hl-pan-block-visible';
        $indication = empty($data['open']) ? '' : ' hl-pan-rotate-90-return';
        $selected = empty($data['selected']) ? '' : ' hl-pan-over-selected-section';
        $image = $data['image'] ?? null;

        $image = $image ? "<img src=\"$image\" class=\"hl-pan-menu-image\" width=\"20\" height=\"20\"><i> </i>" : '';
        $indicator = "<span class=\"hl-pan-menu-open-symbol hl-pan-rotate-90{$indication}\">&rsaquo;</span>";

        return "<div class=\"hl-pan-menu-section{$selected}\">" . PHP_EOL .
            "<button class=\"hl-pan-menu-section-btn\">" .
            "<div>{$image}{$name}{$indicator}</div></button>" . PHP_EOL .
            "<div class=\"hl-pan-menu-attachment{$open}\">" . PHP_EOL .
            $content . '</div>' . PHP_EOL . '</div>' . PHP_EOL;
    }

    private function createRow(array $data): string
    {
        $routeName = $data['route'] ?? null;
        $isCurrentClass = '';
        if (!empty($data['current'])) {
            $isCurrentClass = ' hl-pan-current-url';
        }
        return "<div class='hl-pan-menu-row{$isCurrentClass}'>" . $this->getLink($routeName, $data) . "</div>" . PHP_EOL;
    }

    private function getLink(?string $routeName, array $block): string
    {
        $name = $this->getName($block);
        if (!$name) {
            throw new Http404NotFoundException();
        }
        $prefix = '';
        $img = $block['image'] ?? null;
        $image = $img ? "<img src=\"{$img}\" class=\"hl-pan-menu-image\" width=\"20\" height=\"20\"><i> </i>" : '';
        if (!isset($block['link'])) {
            $name = "<span class=\"hl-pan-route\">{$name}</span>";
            try {
                $uri = url($routeName, ['lang' => $this->lang]);
            } catch (\Throwable $t) {
                //logger()->error("Invalid route name `$routeName` for the admin panel. " . $t->getMessage());
                $prefix = '<span class="hl-pan-error-link" title="Route name not found">&#9746;</span>';
                $uri = '#';
            }
        } else {
            $name = "<span class=\"hl-pan-link\">$name</span>";
            $uri = \strip_tags($block['link']);
        }

        return "<a href='$uri'>{$prefix}{$image}{$name}</a>";
    }

    /**
     * Returns the name of the line in the menu according to the settings.
     *
     * Возвращает название строки в меню согласно настройкам.
     */
    private function getName(array $data): string|false
    {
        if (!isset($data['name'])) {
            throw new \RuntimeException('Name `name` not found for stricture config.');
        }
        if (\is_string($data['name'])) {
            return $data['name'];
        }
        return $data['name'][$this->lang] ?? false;
    }
}