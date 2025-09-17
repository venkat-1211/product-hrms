<table class="table" id="plans-datatable">
    <thead class="thead-light">
        <tr>
            <th class="no-sort">
                <div class="form-check form-check-md">
                    <input class="form-check-input" type="checkbox" id="select-all">
                </div>
            </th>
            <th>Plan Name</th>
            <th>Plan Type</th>
            <th>Total Subscribers</th>
            <th>Price</th>
            <th>Created Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($packages as $plan)
            <tr>
                <td>
                    <div class="form-check form-check-md">
                        <input class="form-check-input" type="checkbox">
                    </div>
                </td>
                <td>
                    <h6 class="fw-medium"><a href="#">{{ $plan->name }}</a></h6>
                </td>
                <td>{{ $plan->type }}</td>
                <td>56</td>
                <td>@currency($plan->currency){{ $plan->price }}</td>
                <td>@custom_date($plan->created_at)</td>
                <td>
                    <x-status-badge :color="$plan->status_color" :icon="$plan->status_icon" :label="$plan->status" />
                </td>
                <td>
                    <x-action :target="['edit_plans', 'delete_modal']" :list="['edit', 'delete']" :id="$plan->id" />
                </td>
            </tr>
        @endforeach
    </tbody>
</table>