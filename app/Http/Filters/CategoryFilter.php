<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends AbstractFilter
{
    public const ID = 'id';
    public const TITLE = 'title';
    public const DESCRIPTION = 'description';

    protected function getCallbacks(): array
    {
        return [
            self::ID => [$this, 'id'],
            self::TITLE => [$this, 'title'],
            self::DESCRIPTION => [$this, 'description'],
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

    public function description(Builder $builder, $value)
    {
        $builder->where('description', 'like', "%{$value}%");
    }
}
