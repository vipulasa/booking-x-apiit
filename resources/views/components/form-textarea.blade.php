<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>

    <textarea type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" id="{{ $id }}"
        name="{{ $name }}" aria-describedby="{{ $name }}Help"
        placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }}>{{ old($name, $value) }}</textarea>

    <div id="{{ $name }}Help" class="form-text">{{ $help }}</div>

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
