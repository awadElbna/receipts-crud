@extends('layouts.app')
@section('content')
    <div class="content-wrapper" style="min-height: 1231.06px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">الرئيسيه </a></li>
                            <li class="breadcrumb-item ">السندات </li>
                            <li class="breadcrumb-item active">عرض جميع السندات </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

<div class="bg-white">
    <br>
    <div class="table-responsive">
        <table
            id="data-table-id"
            class="table table-bordered table-striped
                             display nowrap">
            <thead>
            <tr>
                <th class="details-control">#</th>
                <th>رقم السند</th>
                <th>الحساب الدائن</th>
                <th>البيان / السبب </th>
                <th>اسم المستلم</th>
                <th>نوع السند</th>
                <th>المبلغ</th>
                <th>التاريخ</th>
                <th>الاعدادات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($receipts as $index => $receipt)
                <tr>
                    <td class="details-control">{{++$index}}</td>
                    <td>{{$receipt->id}}</td>
                    <td> {{$receipt->receipt_credit_account}}</td>
                    <td> {{$receipt->receipt_reason}}</td>
                    <td> {{$receipt->recipient_name}}</td>
                    <td> {{$receipt->receipt_type}}</td>
                    <td> {{$receipt->total_amount}} / {{$receipt->currency}}</td>
                    <td> {{$receipt->created_at}}</td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" target="_blank" href="{{route('receipts.show',$receipt->id)}}">
                            <i class="fas fa-folder">
                            </i>
                            عرض
                        </a>
                        <a class="btn btn-success btn-sm" href="">
                            <i class="fas fa-pencil-alt">
                            </i>
                            تعديل
                        </a>
                        <a class="btn btn-danger btn-sm deletereceipt" data-id="{{$receipt->id}}"  >
                            <i class="fas fa-trash">
                            </i>
                            حذف
                        </a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
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

            $(document).on('click','.deletereceipt',function(e){
                e.preventDefault();
                e.stopPropagation();
                var id=$(this).data('id');

                console.log(id);
                var tr=$(this).closest("tr");
                Swal.fire({
                    title: 'سوف تقوم بحذف السند نهائيا.',
                    text: "لن يمكنك استرداد البيانات مره اخرى!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'نعم',
                    cancelButtonText: "لا!"
                }).then(
                    result => {
                        if (result.value) {
                            $.ajax({
                                type:"DELETE",
                                url:"receipts/"+id,
                                data:{
                                    "_token" : "{{ csrf_token()  }}"
                                },
                                success:function(response){
                                    Swal.fire(
                                        'تم',
                                        'تم حذف السند',
                                        'success'
                                    );
                                    tr.remove();
                                }
                            });
                        }
                    });
            });

        });


    </script>
@endpush
