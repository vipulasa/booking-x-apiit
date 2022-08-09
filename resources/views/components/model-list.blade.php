<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                @foreach ($columns as $column)
                    <th scope="col">{{ ucwords(str_replace('_', ' ', $column)) }}</th>
                @endforeach
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($models as $model)
                <tr>
                    <th scope="row">{{ $model->id }}</th>
                    @foreach ($columns as $column)
                        <td>
                            @if ($column === 'status')
                                @if ($model->{$column})
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-success" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="height: 20px;">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" style="height: 20px;" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @endif
                            @else
                                {{ $model->{$column} }}
                            @endif
                        </td>
                    @endforeach
                    <td>
                        @php
                            $route = strtolower(Str::plural(class_basename($model)));
                        @endphp
                        <a href="{{ route($route . '.show', $model->id) }}" class="btn btn-sm btn-success">
                            View
                        </a>
                        <a href="{{ route($route . '.edit', $model->id) }}" class="btn btn-sm btn-primary">
                            Edit
                        </a>
                        <form id="model-delete-{{ $model->id }}"
                            action="{{ route($route . '.destroy', $model->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                onclick="confirm('Are you sure?') ? document.getElementById('model-delete-{{ $model->id }}').submit() : ''"
                                class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $models->links() }}
</div>
