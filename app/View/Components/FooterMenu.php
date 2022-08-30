<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Content\Page;

class FooterMenu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // get all the active pages to be displayed as menu items
        $pages = (new Page())
            ->newQuery()
            ->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('components.footer-menu', [
            'pages' => $pages
        ]);
    }
}
