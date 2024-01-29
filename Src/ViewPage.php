<?php

declare(strict_types=1);

namespace Phphleb\Adminpan\Src;

use ErrorException;
use Exception;
use Hleb\Helpers\ArrayHelper;
use Hleb\Http404NotFoundException;
use Hleb\Static\Settings;

final readonly class ViewPage
{
    /**
     * @throws ErrorException
     */
    public static function viewHeader(array $data, string $panelName): string
    {
        \ob_start();
        $header = Settings::getRealPath('@library/adminpan/templates/type/panel/header.php');
        if ($header) {
            $apiVersion = ConfigDirector::API_VERSION;
            $configDirector = new ConfigDirector($panelName);

            $lang = $data['language'] ?? Settings::getAutodetectLang();
            if (!\in_array($lang, Settings::getParam('main', 'allowed.languages'))) {
                throw new Http404NotFoundException();
            }
            $config = $configDirector->getConfig();
            $design = $config['design'] ?? 'base';
            $type = $config['type'] ?? 'panel';

            $title = (string)$data['title'];
            $headData = self::getHeadRows($data);
            $logoUri = (string)$data['logoUri'];

            $showcaseRight = $data['showcaseRight'];
            $showcaseCenter = $data['showcaseCenter'];

            $menu = $configDirector->getMenu();
            $selector = new SelectParent($menu, $lang);
            $menu = $selector->getUpdated();
            $trans = $selector->getTrans();
            $breadcrumbs = '';
            if (($config['breadcrumbs'] ?? 'on') === 'on') {
                $list = $selector->getBreadcrumbs();
                if ($list) {
                    $breadcrumbs = self::createBreadcrumbs($list);
                }
            }
            if ($type === 'panel') {
                $menuContent = (new PanelMenu($menu, $lang))->getHtml();
            } else {
                throw new ErrorException("Unsupported admin panel `$type` type.");
            }
            $translated = [];
            $routeName = \route_name();
            foreach($trans as $item) {
                if ($routeName) {
                    try {
                        $translated[\strtoupper($item)] = \url($routeName, ['lang' => $item]);
                    } catch (Exception) {
                        $translated[\strtoupper($item)] = \url($routeName);
                    }
                }
            }
            $translated = \array_unique($translated);
            if (count($translated) === 1) {
                $translated = [];
            } else {
                $translated = ArrayHelper::moveToFirst($translated, \strtoupper((string)$lang));
            }

            require $header;
        }
        return \ob_get_clean();
    }

    public static function viewFooter(): string
    {
        \ob_start();
        $footer = Settings::getRealPath('@library/adminpan/templates/type/panel/footer.php');
        if ($footer) {
            $apiVersion =  ConfigDirector::API_VERSION;
            require $footer;
        }
        return \ob_get_clean();
    }

    private static function getHeadRows(array $data): array
    {
        $result = [];
        if ($data['viewportContent']) {
            $result[] = '<meta name="viewport" content="' . $data['viewportContent'] . '">';
        }
        if ($data['themeColor']) {
            $result[] = '<meta name="theme-color" content="' . $data['themeColor'] . '">';
        }
        if ($data['description']) {
            $result[] = '<meta name="description" content="' . $data['description'] . '">';
        }
        if ($data['faviconUri']) {
            $result[] = '<link rel="icon" href="' . $data['faviconUri'] . '" type="image/x-icon">';
        }
        if ($data['cssResources']) {
            foreach($data['cssResources'] as $url) {
                $result[] = '<link rel="stylesheet" href="' . $url . '">';
            }
        }
        if ($data['jsResources']) {
            foreach($data['jsResources'] as $url) {
                $result[] = '<script src="' . $url . '" async></script>';
            }
        }
        if ($data['metaRows']) {
            foreach($data['metaRows'] as $row) {
                $result[] = $row;
            }
        }
        return $result;
    }

    public static function createBreadcrumbs(array $b): string
    {
        foreach($b as &$item) {
            $item = "<span class=\"hl-pan-bdc\">" . \trim((string)$item) . "</span>";
        }
        return \implode('<span class="hl-pan-bdc-separator">/</span>', $b);
    }
}