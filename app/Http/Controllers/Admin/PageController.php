<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Helpers\ListView;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Category;
use App\Models\Content\Page;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    use ListView;

    protected $model = Page::class;

    protected $fields = [
        'title',
        'url',
        'sort_order',
        'status',
    ];

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.form', [
            'page' => new Page(),
            'categories' => (new Category())->where('status', 1)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        $validated = $request->validated();

        $page = (new Page())->create([
            "title" => $validated['title'],
            "url" => Str::slug($validated['url']),
            "summary" => $validated['summary'],
            "content" => $validated['content'],
            "category_id" => $validated['category_id'],
        ]);

        // check if the request has an image
        if ($request->has('image')) {
            $page->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('admin.pages.show', [
            'page' => $page,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.form', [
            'page' => $page,
            'categories' => (new Category())->where('status', 1)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePageRequest  $request
     * @param  \App\Models\Content\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $validated = $request->validated();

        $page->update([
            "title" => $validated['title'],
            "url" => Str::slug($validated['url']),
            "summary" => $validated['summary'],
            "content" => $validated['content'],
            "category_id" => $validated['category_id'],
        ]);

        // check if the request has an image
        if ($request->has('image')) {
            $page->clearMediaCollection('images');
            $page->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {

        $page->delete();

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page deleted successfully');
    }
}
