@include('admin::layouts.header')
@include('admin::layouts.topbar')
@include('admin::layouts.sidebar')


<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Email</th>
                        <th scope="col">Registered Date</th>
                        <th scope="col">Branches</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($providers as $provider)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $provider->name }}</td>
                            <td>{{ $provider->desc }}</td>
                            <td>{{ $provider->email }}</td>
                            <td>{{ $provider->created_at->format('M d, H:i') }}</td>
                            <td>
{{--                                <select onchange="redirectToBranch(this)">--}}
{{--                                <option>Select Branch</option>--}}

{{--                                @foreach ($provider->branches as $branch)--}}
{{--                                        <option value="{{ route("admin.dashboard.branches.show" , $branch->id) }}">{{ $branch->branch_name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Choose A Branch</button>
                                    <div class="dropdown-menu dropdownmenu-secondary">
                                    @foreach ($provider->branches as $branch)
                                        <a class="dropdown-item" href="{{ route("admin.dashboard.branches.show", $branch->id) }}">{{ $branch->branch_name }}</a>
                                    @endforeach
                                    </div>
                                </div><!-- btn-group -->
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot class="table-light">

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@include('admin::layouts.scripts')
<script>
    function redirectToBranch(selectElement) {
        var branchUrl = selectElement.value;
        if (branchUrl !== "") {
            window.location.href = branchUrl;
        }
    }
</script>
