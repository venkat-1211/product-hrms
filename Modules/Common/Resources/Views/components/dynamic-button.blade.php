@permission('ui-access')
    <div id="custom-button-div" class="custom-button-div d-inline-block ms-3">
        @foreach ($types as $type)
            @if ($type === 'table')
                <button type="button" class="btn btn-primary mt-1"
                        data-bs-toggle="modal" data-bs-target="#manage-table-modal">
                    Manage Table
                </button>
            @elseif ($type === 'form')
                <button type="button" class="btn btn-primary mt-1"
                        data-bs-toggle="modal" data-bs-target="#manage-form-modal">
                    Manage Form
                </button>
            @elseif ($type === 'field')
                <button type="button" class="btn btn-primary mt-1"
                        data-bs-toggle="modal" data-bs-target="#add-new-field-modal">
                    Add New Field
                </button>
            @endif
        @endforeach
    </div>
@endpermission
