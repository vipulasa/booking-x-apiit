<?php

namespace App\View\Components;

use App\Models\Hotel;
use Illuminate\View\Component;

class HotelList extends Component
{

    public $hotels;

    public $hotel_id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($hotelId = null)
    {
        $this->hotels = (new Hotel())->get();

        $this->hotel_id = $hotelId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.hotel-list', [
            'hotels' => $this->hotels,
            'hotel_id' => $this->hotel_id
        ]);
    }
}
