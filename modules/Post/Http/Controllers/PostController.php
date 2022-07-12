<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Inertia\Response;
use Modules\Post\Actions\PostAction;
use Modules\Post\Datatable\PostDatatable;
use Modules\Post\Entities\Post;
use Modules\Post\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(): Response
    {
        return inertia('Post::article/index')->inertable(new PostDatatable)->title(__('Manage Post'));
    }

    public function create(): Response
    {
        return inertia('Post::article/create')->title(__('Create Post'));
    }

    public function store(PostRequest $request): RedirectResponse
    {
        try {
            PostAction::create($request);

            return redirect()->route('dashboard.post.post.index')->with(['success' => __('Berhasil menambah artikel baru')]);
        } catch (\Throwable $th) {
            return back()->error(__('Terjadi kesalahan saat menambah artikel'));
        }
    }

    public function edit(Post $post)
    {
        $post->load('category');

        return inertia('Post::article/edit')->with(['post' => $post])
            ->title(__('Update post'));
    }

    public function update(Post $post, PostRequest $request): RedirectResponse
    {
        try {
            PostAction::update($post, $request);

            return redirect()->route('dashboard.post.post.index')->with(['success' => __('Berhasil mengubah artikel')]);
        } catch (\Throwable $th) {
            return back()->error(__('Terjadi kesalahan saat mengubah artikel'));
        }
    }

    public function destroy(Post $post)
    {
        try {
            PostAction::destroy($post);

            return back()->success(__('Berhasil menghapus artikel'));
        } catch (\Throwable $th) {
            return back()->error(__('Terjadi kesalahan saat menghapus artikel'));
        }
    }
}
