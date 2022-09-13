<div class="mb-3" x-data="features">
    <label for="features" class="form-label">Features</label>

    <div class="input-group mb-3">
        <input type="text" class="form-control" x-on:keydown.enter.prevent="addFeature" x-model="featureName"
            placeholder="Feature">
        <a class="btn btn-outline-secondary" x-on:click="addFeature">
            Add
        </a>
    </div>

    <ul class="list-group">
        <template x-for="(item, key) in features">
            <li class="list-group-item">
                <div x-text="item" class="d-inline-flex"></div>
                <div x-on:click="removeFeature(key)" class="btn btn-danger btn-sm d-inline float-end">X</div>
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
                addFeature(event) {

                    // check if the featureName is not empty
                    if (this.featureName) {
                        // add the feture name to the features list
                        this.features.push(this.featureName);
                        // clear the feature name
                        this.featureName = null;
                    }
                },
                removeFeature(index) {
                    this.features.splice(index, 1);
                },
            }))
        })
    </script>
@endpush
