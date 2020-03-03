<?php namespace Braceyourself\GravatarDefault;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\Gravatar as BaseGravatar;
use function GuzzleHttp\Psr7\build_query;

class Gravatar extends BaseGravatar
{
    private $default;
    private $size;

    protected function resolveAttribute($resource, $attribute)
    {
        $gravatar_url = "https://www.gravatar.com/avatar/" . md5(strtolower(data_get($resource, $attribute)));;

        $this->preview($callback = fn() => "$gravatar_url?" . $this->getGravatarQuery())
            ->thumbnail($callback);
    }

    public function default($url)
    {
        $this->default = $url;

        return $this;
    }

    public function size($pixels)
    {
        $this->size = $pixels;
        return $this;
    }

    private function getGravatarQuery()
    {
        $params = [];
        $params['size'] = $this->size ?? 3;

        if ($this->default) {
            $params['default'] = $this->default;
        }

        return build_query($params);
    }
}
