@include('admin.layouts.sidebar')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">All Neco Pin</h4>
                {{--                    <p class="text-muted mb-4 font-13">Use <code>pencil icon</code> to view user profile.</p>--}}
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Action</th>
                            <th>Username</th>
                            <th>pin</th>
                            <th>Ref</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all as $dat)
                            <tr>
                                <td>{{$dat->id}}</td>
                                <td><a href="{{route('necopin', $dat->id)}}"><i class="fa fa-eye"></i> </a></td>
                                <td>{{$dat->username}}</td>
                                <td>{{$dat->pin}}</td>
                                <td>{{$dat->ref}}</td>
                                <td>{{$dat->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@include('layouts.footer')
