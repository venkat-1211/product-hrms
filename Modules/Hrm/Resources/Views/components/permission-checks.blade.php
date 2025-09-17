<td>
    <div class="form-check d-flex align-items-center">
        <label class="form-check-label mt-0">
            <input class="form-check-input" type="checkbox" value="{{ $slug }}_view" name="permissions[]">
            Read
        </label>
    </div>
</td>
<td>
    <div class="form-check d-flex align-items-center">
        <label class="form-check-label mt-0">
            <input class="form-check-input" type="checkbox" value="{{ $slug }}_edit" name="permissions[]">
            Write
        </label>
    </div>
</td>
<td>
    <div class="form-check d-flex align-items-center">
        <label class="form-check-label mt-0">
            <input class="form-check-input" type="checkbox" value="{{ $slug }}_add" name="permissions[]">
            Create
        </label>
    </div>
</td>
<td>
    <div class="form-check d-flex align-items-center">
        <label class="form-check-label mt-0">
            <input class="form-check-input" type="checkbox" value="{{ $slug }}_delete" name="permissions[]">
            Delete
        </label>
    </div>
</td>
<td>
    <div class="form-check d-flex align-items-center">
        <label class="form-check-label mt-0">
            <input class="form-check-input" type="checkbox" value="{{ $slug }}_export" name="permissions[]">
            Export
        </label>
    </div>
</td>
