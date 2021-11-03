@extends('layouts.app')
@section('content')
    <div class="content-wrapper" style="min-height: 1231.06px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">الرئيسيه </a></li>
                            <li class="breadcrumb-item active">السندات </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">عرض جميع السندات</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            id="data-table-id"
                            class="table table-bordered table-striped
                             display nowrap">
                        <thead>
                        <tr>
                            <th class="details-control">#</th>
                            <th>رقم السند</th>
                            <th>مصدر السند</th>
                            <th>التحصيل</th>
                            <th>الحساب الدائن</th>
                            <th>البيان / السبب </th>
                            <th>اسم المستلم</th>
                            <th>الهاتف</th>
                            <th>العنوان</th>
                            <th>نوع السند</th>
                            <th>اسم البنك</th>
                            <th>رقم الشيك</th>
                            <th>المبلغ</th>
                            <th>العمله</th>
                            <th>اسم المورد</th>
                            <th>رقم المورد</th>
                            <th>الرقم الضريبى</th>
                            <th>التاريخ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($receipts as $index => $receipt)
                            <tr>
                                <td class="details-control">{{++$index}}</td>
                                <td>{{$receipt->id}}</td>
                                <td>{{$receipt->receipt_issuer}}</td>
                                <td>{{$receipt->receipt_collection_method}}</td>
                                <td> {{$receipt->receipt_credit_account}}</td>
                                <td> {{$receipt->receipt_reason}}</td>
                                <td> {{$receipt->recipient_name}}</td>
                                <td> {{$receipt->recipient_phone}}</td>
                                <td> {{$receipt->recipient_address}}</td>
                                <td> {{$receipt->receipt_type}}</td>
                                <td> {{$receipt->bank_name}}</td>
                                <td> {{$receipt->check_number}}</td>
                                <td> {{$receipt->total_amount}}</td>
                                <td> {{$receipt->currency}}</td>
                                <td> {{$receipt->supplier_name}}</td>
                                <td> {{$receipt->supplier_no}}</td>
                                <td> {{$receipt->tax_number}}</td>
                                <td> {{$receipt->created_at}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>

            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
@push('js')
    <script>
        $(function (){
            $("#data-table-id").DataTable( {
                'responsive': true,
                "language": {
                    "decimal":        "",
                    "emptyTable":     "لا يوجد بيانات ",
                    "info":           "عرض _START_ الى _END_ من _TOTAL_ صف",
                    "infoEmpty":      "عرض 0 الى 0 من 0 صف",
                    "infoFiltered":   "(الاجمالى _MAX_ صف)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "عرض _MENU_ صف",
                    "loadingRecords": "جارى التحميل ...",
                    "processing":     "جارى المعالجه ...",
                    "search":         "بحث :",
                    "zeroRecords":    "لا يوجد نتائج مشابهه",
                    "paginate": {
                        "first":      "First",
                        "last":       "Last",
                        "next":       "التالى",
                        "previous":   "السابق"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                },

            });
        });
        setTimeout(function() {
            $('.alert').fadeOut('fast');
        }, 30000);
    </script>
@endpush
