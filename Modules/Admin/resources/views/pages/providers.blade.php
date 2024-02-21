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
                        <th scope="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="responsivetableCheck">
                                <label class="form-check-label" for="responsivetableCheck"></label>
                            </div>
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Provider</th>
                        <th scope="col">Main Salon Location</th>
                        <th scope="col">Revenue</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="responsivetableCheck01">
                                <label class="form-check-label" for="responsivetableCheck01"></label>
                            </div>
                        </th>
                        <td><a href="#" class="fw-semibold">#VZ2110</a></td>
                        <td>10 Oct, 14:47</td>
                        <td class="text-success"><i class="ri-checkbox-circle-line fs-17 align-middle"></i> Paid</td>
                        <td>
                            <div class="d-flex gap-2 align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-xs rounded-circle" />
                                </div>
                                <div class="flex-grow-1">
                                    Jordan Kennedy
                                </div>
                            </div>
                        </td>
                        <td>Mastering the grid</td>
                        <td>$9.98</td>
                    </tr>
                    </tbody>
                    <tfoot class="table-light">
                    <tr>
                        <td colspan="6">Total</td>
                        <td>$947.55</td>
                    </tr>
                    </tfoot>
                </table>
                <!-- end table -->
            </div>
            <!-- end table responsive -->
        </div>
    </div>
</div>

@include('admin::layouts.scripts')
