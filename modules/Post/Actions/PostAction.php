<?php

namespace Modules\Post\Actions;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Post\Entities\Post;
use Modules\Post\Http\Requests\PostRequest;

class PostAction
{
    public static function create(PostRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $post = Post::create($request->getData());
            $post->image()->create([
                'url' => $request->getThumbnailPath(),
            ]);

            return $post;
        });
    }

    public static function update(Post $post, PostRequest $request)
    {
        return DB::transaction(function () use ($post, $request) {
            $post->update(Arr::except($request->getData(), 'slug'));

            $post->image()->update([
                'url' => $request->hasFile('cover')
                    ? $request->getThumbnailPath()
                    : Str::after($post->image->url, config('app.url').'/'),
            ]);

            return $post;
        });
    }

    public static function destroy(Post $post)
    {
        return DB::transaction(function () use ($post) {
            $post->delete();
        });
    }
}
