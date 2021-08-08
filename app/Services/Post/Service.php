<?php


namespace App\Services\Post;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function index($posts)
    {
        foreach ($posts as $post) {
            $post['tags'] = $post->tags()->pluck('title');
            $post['category'] = $post->category()->value('title');
        }

        return $posts;
    }

    public function store($data)
    {
        try {
            Db::beginTransaction();

            $tagsIds = $this->getTags($data);
            unset($data['tags'], $data['newTags']);

            $post = Post::create($data);
            $post->tags()->attach($tagsIds);

            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            return $exception->getMessage();
        }
    }

    public function update($post, $data)
    {
        try {
            Db::beginTransaction();

            $tagsIds = $this->getTags($data);
            unset($data['tags'], $data['newTags']);

            $post->update($data);
            $post->tags()->sync($tagsIds);

            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            return $exception->getMessage();
        }

        return $post->fresh();
    }

    public function destroy($postTags, $post)
    {
        foreach ($postTags as $row)
            $row->delete();

        $post->delete();
    }

    private function getTags($data)
    {
        $tags = [];
        if (isset($data['newTags']))
            $tags = array_merge($tags, $this->getNewTags($data['newTags']));

        if (isset($data['tags']))
            $tags = array_merge($tags, $data['tags']);

        return array_unique($tags);
    }

    private function getNewTags($tags)
    {
        $tags = $this->getTagsTitleArray($tags);
        $tagsIds = [];
        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate([
                'title' => "$tag",
            ]);

            $tagsIds[] = (string)$tag->id;
        }

        return $tagsIds;
    }

    private function getTagsTitleArray($tags) // Принимает строку, возвращает массив с названиями для тегов
    {
        $arr = explode(',', $tags);

        for ($i = 0; $i < count($arr); $i++) {
            $arr[$i] = preg_replace('#[^0-9a-zA-Zа-яА-ЯёЁ -]#', '', trim($arr[$i]));
            if (strlen($arr[$i]) < 1) unset($arr[$i]);
        }
        return $arr;
    }
}
