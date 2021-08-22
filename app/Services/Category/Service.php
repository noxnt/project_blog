<?php


namespace App\Services\Category;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Service
{
    public function store($data)
    {
        try {
            Db::beginTransaction();
            $category = Category::create($data);
            $this->loggingSuccess($category, 'creating');
            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            $this->loggingFailed($exception, 'create');

            return [
                'message' => 'Failed to create category!',
                'status' => 'danger',
            ];
        }

        return [
            'message' => 'Category created successfully!',
            'status' => 'success',
        ];
    }

    public function update($category, $data)
    {
        try {
            Db::beginTransaction();
            $category->update($data);
            $this->loggingSuccess($category, 'updating');
            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            $this->loggingFailed($exception, 'update');

            return [
                'message' => 'Failed to update category!',
                'status' => 'danger',
            ];
        }

        $category->fresh();

        return [
            'id' => $category->id,
            'flash' => [
                'message' => 'Category edited successfully!',
                'status' => 'success',
            ],
        ];
    }

    public function destroy($category)
    {
        try {
            Db::beginTransaction();
            $category->delete();
            $this->loggingSuccess($category, 'deleting');
            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            $this->loggingFailed($exception, 'delete');

            return [
                'message' => "Category can't be deleted, {$category->posts->count()} belongs to it!",
                'status' => 'danger',
            ];
        }

        return [
            'message' => 'Category successfully deleted!',
            'status' => 'success',
        ];
    }

    // Logs
    private function loggingSuccess ($category, $action)
    {
        Log::channel('debuginfo')->info("Successful $action - category", [
            'id' => $category->id,
            'title' => $category->title,
            'description' => $category->description,
        ]);
    }

    private function loggingFailed ($exception, $action)
    {
        Log::channel('debuginfo')->error("Failed to $action - category", [
           'error' => $exception->getMessage(),
        ]);
    }
}
