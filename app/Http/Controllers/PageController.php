<?php

namespace App\Http\Controllers;

use App\Models\Content\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, string $url)
    {
        // check if the page exists by checking the URL in the database
        $page = (new Page())
            ->newQuery()
            ->where('url', $url)
            ->first();

        // if the page does not exists, show a 404 page
        if (!$page) {
            return abort(404);
        }

        return view('pages.show', [
            'page' => $page
        ]);
    }
}
