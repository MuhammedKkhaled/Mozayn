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
                        <th scope="col">Branch Name </th>
                        <th scope="col">Branch Location</th>
                        <th scope="col">Branch Phone Number</th>
                        <th scope="col"> Owner </th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Actions </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($branches as $branch)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $branch->branch_name }}</td>
                            <td>{{$branch->branch_location}}</td>
                            <td>{{$branch->phone}}</td>
                            <td>{{$branch->provider->name}}</td>
                            <td>{{$branch->created_at->format('M d, H:i') }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="{{ route("admin.dashboard.branches.show" , $branch->id) }}" class="btn btn-info btn-sm me-2"> Details </a>
                                    <a href="#" class="btn btn-danger btn-sm me-2">Hide</a>
                                </div>
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
