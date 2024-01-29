<?php

declare(strict_types=1);

namespace Phphleb\Adminpan\Src;

use Hleb\Helpers\ResourceViewHelper;
use Hleb\HttpMethods\External\SystemRequest;
use Hleb\Static\Settings;

final class Resources
{
    private const  ALLOWED_EXT = ['css', 'js', 'svg'];

    public function __construct(private readonly SystemRequest $request)
    {
    }

    /**
     * Returns the result of a system query to the library.
     *
     * Возвращает результат вызова системного запроса к библиотеке.
     */
    public function get(): bool
    {
        $path = $this->request->getUri()->getPath();

        $address = \explode('/', \trim($path, '/'));

        $part = \array_pop($address);
        $ext = \array_pop($address);

        if (!\in_array($ext, self::ALLOWED_EXT)) {
            return false;
        }
        if (empty($part) || !\preg_match("#^[aA-zZ0-9\-]+$#", $part)) {
            return false;
        }

        $file = Settings::getRealPath('@library/adminpan/web/' . $ext . '/' . $part . '.' . $ext);
        if (!$file) {
            return false;
        }

        return (new ResourceViewHelper())->add($file);
    }
}