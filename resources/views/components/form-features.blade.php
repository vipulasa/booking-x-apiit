<div class="mb-3" x-data="features">
    <label for="features" class="form-label">Features</label>

    <div class="input-group mb-3">
        <input type="text" class="form-control" x-model="featureName" placeholder="Feature">
        <button class="btn btn-outline-secondary" type="button" id="button-addon2"
        x-on:click="addFeature">Add</button>
    </div>

    <ul class="list-group">
        <template x-for="(item, key) in features">
            <li class="list-group-item d-flex">
                <div x-text="item"></div>
                <div x-on:click="removeFeature(key)" class="btn btn-danger btn-sm">X</div>
            </li>
        </template>
    </ul>

    <input type="hidden" name="features" x-model="features">

    <div id="FeaturesHelp" class="form-text">Features</div>
    @error('features')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('features', () => ({
                featureName: null,
                features: @json($value),
                addFeature() {
                    // add the feture name to the features list
                    this.features.push(this.featureName);
                    // clear the feature name
                    this.featureName = null;
                },

                removeFeature(index) {
                    this.features.splice(index, 1);
                },


                // features: [
                //     'test',
                //     'name'
                // ], // @json($value)
                // feature: 'test',


            }))
        })
    </script>
@endpush
