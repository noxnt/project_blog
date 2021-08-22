<?php


namespace App\Services\Tag;

use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Service
{
    public function store($data)
    {
        try {
            Db::beginTransaction();
            $tag = Tag::create($data);
            $this->loggingSuccess($tag, 'creating');
            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            $this->loggingFailed($exception, 'create');

            return [
                'message' => 'Failed to create tag!',
                'status' => 'danger',
            ];
        }

        return [
            'message' => 'Tag created successfully!',
            'status' => 'success',
        ];
    }

    public function update($tag, $data)
    {
        try {
            Db::beginTransaction();
            $tag->update($data);
            $this->loggingSuccess($tag, 'updating');
            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            $this->loggingFailed($exception, 'update');

            return [
                'message' => 'Failed to update tag!',
                'status' => 'danger',
            ];
        }

        $tag->fresh();

        return [
            'id' => $tag->id,
            'flash' => [
                'message' => 'Tag edited successfully!',
                'status' => 'success',
            ],
        ];
    }

    public function destroy($tag)
    {
        try {
            Db::beginTransaction();
            $tag->delete();
            $this->loggingSuccess($tag, 'deleting');
            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            $this->loggingFailed($exception, 'delete');

            return [
                'message' => "Tag can't be deleted, {$tag->posts->count()} belongs to it!",
                'status' => 'danger',
            ];
        }

        return [
            'message' => 'Tag successfully deleted!',
            'status' => 'success',
        ];
    }

    // Logs
    private function loggingSuccess ($tag, $action)
    {
        Log::channel('debuginfo')->info("Successful $action - tag", [
            'id' => $tag->id,
            'title' => $tag->title,
        ]);
    }

    private function loggingFailed ($exception, $action)
    {
        Log::channel('debuginfo')->error("Failed to $action - tag", [
            'error' => $exception->getMessage(),
        ]);
    }
}
