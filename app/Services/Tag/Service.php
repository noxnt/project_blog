<?php


namespace App\Services\Tag;

use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data)
    {
        try {
            Db::beginTransaction();

            Tag::create($data);

            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            return $exception->getMessage();
        }
    }

    public function update($tag, $data)
    {
        try {
            Db::beginTransaction();

            $tag->update($data);

            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            return $exception->getMessage();
        }
        return $tag->fresh();
    }
//
//    public function destroy($photoTag, $photo)
//    {
//        foreach ($photoTag as $row)
//            $row->delete();
//
//        $photo->delete();
//    }
//
//    private function getCategoryId($item)
//    {
//        $category = !isset($item['id']) ? Category::create($item) : Category::find($item['id']);
//        return $category->id;
//    }
//
//    private function getTagsIds($tags)
//    {
//        $tagsIds = [];
//        foreach ($tags as $tag) {
//            $tag = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
//            $tagsIds = $tag->id;
//        }
//        return $tagsIds;
//    }
}
