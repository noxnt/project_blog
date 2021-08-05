<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class TagFilter extends AbstractFilter
{
    public const ID = 'id';
    public const TITLE = 'title';

    protected function getCallbacks(): array
    {
        return [
            self::ID => [$this, 'id'],
            self::TITLE => [$this, 'title'],
        ];
    }

    public function id(Builder $builder, $value)
    {
        $builder->where('id', $value);
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }
}
