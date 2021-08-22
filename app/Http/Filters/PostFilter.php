<?php


namespace App\Http\Filters;


use App\Models\PostTag;
use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const ID = 'id';
    public const TITLE = 'title';
    public const CATEGORY = 'category';
    public const TAG = 'tag';
    public const PREVIEW = 'preview';
    public const CONTENT = 'content';

    protected function getCallbacks(): array
    {
        return [
            self::ID => [$this, 'id'],
            self::TITLE => [$this, 'title'],
            self::CATEGORY => [$this, 'category'],
            self::TAG => [$this, 'tag'],
            self::PREVIEW => [$this, 'preview'],
            self::CONTENT => [$this, 'content'],
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

    public function category(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }

    public function tag(Builder $builder, $value)
    {
        $photosIds = PostTag::where('tag_id', $value)->get()->pluck('post_id');

        $builder->whereIn('id', $photosIds);
    }

    public function preview(Builder $builder, $value)
    {
        $builder->where('preview', 'like', "%{$value}%");
    }

    public function content(Builder $builder, $value)
    {
        $builder->where('content', 'like', "%{$value}%");
    }
}
