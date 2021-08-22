<?php


namespace App\Services\Post;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function index($posts)
    {
        $posts = $this->getDates($posts);

        return $posts;
    }

    public function store($data)
    {
        try {
            Db::beginTransaction();

            $tagsIds = $this->getTags($data);

            unset($data['tags'], $data['newTags']);

            $data = $this->setImages($data);

            $post = Post::create($data);
            $post->tags()->attach($tagsIds);

            $this->loggingSuccess($post, 'creating');

            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            $this->loggingFailed($exception, 'create');

            return [
                'message' => 'Failed to create post!',
                'status' => 'danger',
            ];
        }

        return [
            'message' => 'Post created successfully!',
            'status' => 'success',
        ];
    }

    public function update($post, $data)
    {
        try {
            Db::beginTransaction();

            $tagsIds = $this->getTags($data);

            unset($data['tags'], $data['newTags']);

            $data = $this->setImages($data);

            $post->update($data);
            $post->tags()->sync($tagsIds);

            $this->loggingSuccess($post, 'updating');

            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            $this->loggingFailed($exception, 'update');

            return [
                'message' => 'Failed to update post!',
                'status' => 'danger',
            ];
        }

        $post->fresh();

        return [
            'message' => 'Post edited successfully!',
            'status' => 'success',
        ];
    }

    public function destroy($postTags, $post)
    {
        try {
            foreach ($postTags as $row)
                $row->delete();

            $post->delete();
            $this->loggingSuccess($post, 'deleting');
        } catch (\Exception $exception) {
            Db::rollBack();
            $this->loggingFailed($exception, 'delete');

            return [
                'message' => 'Failed to delete post!',
                'status' => 'danger',
            ];
        }

        return [
            'message' => 'Post successfully deleted!',
            'status' => 'success',
        ];
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

    private function getDates($posts)
    {
        foreach ($posts as $post) {
            $time = strtotime($post['created_at']);
            $post['date'] = date('F j, Y', $time) . ' at' . date(' H:i', $time);
        }

        return $posts;
    }

    private function setImages($data)
    {
        if (isset($data['preview_image']))
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        if (isset($data['main_image']))
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

        return $data;
    }

    // Logs
    private function loggingSuccess ($post, $action)
    {
        Log::channel('debuginfo')->info("Successful $action - post", [
            'id' => $post->id,
            'title' => $post->title,
            'category' => ['id' => $post->category->id, 'title' => $post->category->title],
            'tags' => $post->tags->count(),
            'preview' => 'string(' . strlen($post->preview) . ')',
            'content' => 'string(' . strlen($post->content) . ')',
            'preview_image' => $post->preview_image,
            'main_image' => $post->main_image,
            'status' => $post->is_published == 1 ? 'Active' : 'Inactive',
            'deleted' => !empty($post->deleted_at) ? 'True' : 'False',
        ]);
    }

    private function loggingFailed ($exception, $action)
    {
        Log::channel('debuginfo')->error("Failed to $action - post", [
            'error' => $exception->getMessage(),
        ]);
    }
}
