@include('layouts.sidebar')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Charges Transaction</h5>
        <div class="table-responsive">
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                    <th>Date</th>
                    <th>Username</th>
                    <th>Amount Charge</th>
                    <th>Payment_Ref</th>
                    </thead>
                    <tbody>
                    @foreach($bill as $po)
                        <tr>
                            <td>{{$po->date}}</td>
                            <td>{{$po->username}}</td>
                            <td>{{$po->amount}}</td>
                            <td>{{$po->payment_ref}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>


        <!-- this page js -->
        <script src="{{asset('assets/libs/moment/min/moment.min.js')}}"></script>
        <script src="{{asset('assets/libs/fullcalendar/dist/fullcalendar.min.js')}}"></script>
        <script src="{{asset('dist/js/pages/calendar/cal-init.js')}}"></script>
        <script src="{{asset('assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
        <script src="{{asset('assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
        <script src="{{asset('assets/extra-libs/DataTables/datatables.min.js')}}"></script>
        <script>
            /****************************************
             *       Basic Table                   *
             ****************************************/
            $('#zero_config').DataTable();
        </script>

        @include('layouts.footer')


        <script>
            const paymentForm = document.getElementById('paymentForm');
            paymentForm.addEventListener("submit", payWithPaystack, false);
            function payWithPaystack(e) {
                e.preventDefault();
                let handler = PaystackPop.setup({
                    key: 'pk_test_17fd09d2f1b858a21859595153d9770573a7c996', // Replace with your public key
                    email: document.getElementById("email-address").value,
                    amount: document.getElementById("amount").value * 100,
                    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
// label: "Optional string that replaces customer email"
                    onClose: function(){
                        alert('Window closed.');
                    },
                    callback: function(response){
                        let message = 'Payment complete! Reference: ' + response.reference;
                        // alert(message);


                        window.location = '{{ route('tran', '/') }}/'+response.reference;

                    }
                });
                handler.openIframe();
            }
        </script>
        <!-- html -->
        <table id="data-table-buttons" class="table table-striped table-bordered align-middle">
            <thead>
            <tr>
                <th width="1%"></th>
                <th width="1%" data-orderable="false"></th>
                ...
            </tr>
            </thead>
            <tbody>
            ...
            </tbody>
        </table>

        <!-- script -->
        <script>
            $('#data-table-default').DataTable({
                responsive: true,
                dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
                buttons: [
                    { extend: 'copy', className: 'btn-sm' },
                    { extend: 'csv', className: 'btn-sm' },
                    { extend: 'excel', className: 'btn-sm' },
                    { extend: 'pdf', className: 'btn-sm' },
                    { extend: 'print', className: 'btn-sm' }
                ],
            });
        </script>
