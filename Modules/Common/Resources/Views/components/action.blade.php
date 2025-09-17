<div class="action-icon d-inline-flex">
    @foreach ($list as $index => $type)
        @php 
        $modalId = $target[$index] ?? null; 
        $id = $id ?? null;
        @endphp

        @if ($type === 'eye')
            <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#{{ $modalId }}" data-id="{{ $id }}">
                <i class="ti ti-eye"></i>
            </a>
        @elseif ($type === 'edit')
            <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#{{ $modalId }}" data-id="{{ $id }}">
                <i class="ti ti-edit"></i>
            </a>
        @elseif ($type === 'delete')
            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#{{ $modalId }}" data-id="{{ $id }}">
                <i class="ti ti-trash"></i>
            </a>
        @endif
    @endforeach
</div>
