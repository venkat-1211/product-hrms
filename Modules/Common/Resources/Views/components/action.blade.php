<div class="action-icon d-inline-flex">
    @foreach ($list as $index => $action)
        @php
            $modalId = $target[$index] ?? null;
            $permKey = $permission[$action] ?? null;

            $icons = [
                'eye' => 'ti ti-eye',
                'edit' => 'ti ti-edit',
                'delete' => 'ti ti-trash',
            ];
            $icon = $icons[$action] ?? 'ti ti-dots';
        @endphp

        {{-- Permission check --}}
        @if (!empty($permKey))
            @permission($permKey)
                <a href="javascript:void(0);" 
                class="me-2"
                data-bs-toggle="modal" 
                data-bs-target="#{{ $modalId }}"
                data-id="{{ $id }}">
                    <i class="{{ $icon }}"></i>
                </a>
            @endpermission
        @endif
    @endforeach
</div>
