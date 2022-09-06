<x-form-select id="hotel_id"
    name="hotel_id"
    label="Hotel"
    value="{{ $hotel_id }}"
    help=""
    placeholder="Select Hotel"
    :options="$hotels->pluck('name', 'id')" required/>
