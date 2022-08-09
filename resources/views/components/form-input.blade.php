<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control" id="{{ $id }}" name="{{ $name }}"
        aria-describedby="{{ $name }}Help" value="{{ $value }}" placeholder="{{ $placeholder }}">
    <div id="{{ $name }}Help" class="form-text">{{ $help }}</div>
</div>
