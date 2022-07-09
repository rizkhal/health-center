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
        return inertia('Post::post/index')->inertable(new PostDatatable)->title(__('Manage Post'));
    }

    public function create(): Response
    {
        return inertia('Post::post/create')->title(__('Create Post'));
    }

    public function store(PostRequest $request): RedirectResponse
    {
        PostAction::create($request);

        return redirect()->route('dashboard.post.index')->with(['success' => 'Successfully add new post']);
    }

    public function edit(Post $post)
    {
        $post->load('category');

        return inertia('Post::post/edit')->with(['post' => $post])
            ->title(__('Update post'));
    }

    public function update(Post $post, PostRequest $request): RedirectResponse
    {
        PostAction::update($post, $request);

        return redirect()->route('dashboard.post.index')->with(['success' => 'Successfully update existing post']);
    }

    public function destroy(Post $post)
    {
        PostAction::destroy($post);

        return back()->with(['success' => 'Successfully delete post']);
    }
}
