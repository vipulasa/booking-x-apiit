<div class="mb-3 row">
    <div class="{{ $type == 'file' ? 'col-8' : '' }}">
        <label for="{{ $id }}" class="form-label">{{ $label }}</label>

        <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" id="{{ $id }}"
            name="{{ $name }}" aria-describedby="{{ $name }}Help" value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }} />

        <div id="{{ $name }}Help" class="form-text">{{ $help }}</div>

        @error($name)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    @if ($type === 'file')
        <div class="col-4">
            <img src="{{ $value }}" id="{{ $id }}-img" class="w-100">
        </div>
    @endif
</div>
@if ($type === 'file')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var input = document.getElementById('{{ $id }}');
            input.addEventListener('change', function() {

                // check the type of the file that was selected (we only want images)
                var fileType = input.files[0].type;
                if (fileType !== 'image/jpeg' && fileType !== 'image/png') {
                    alert('Please select an image file (jpg or png)');
                    input.value = '';
                }

                // show the selected image
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.getElementById('{{ $id }}-img');
                    img.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            });
        });
    </script>
@endif
