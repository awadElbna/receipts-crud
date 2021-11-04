@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('home')}}">الرئيسيه </a></li>
                            <li class="breadcrumb-item ">السندات</li>
                            <li class="breadcrumb-item active">اضافه سند صرف متعدد</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="col-md-12">

                <!-- start main data  -->
                <div class="card bg-light">
                    <div class="card-header">
                        <h3 class="card-title">اضافه سند صرف جديد</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form id="add-receipt-form">
                            @csrf

                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <fieldset class="border border-secondary p-2">
                                        <legend class="w-100 px-2 bg-secondary"
                                                style="font-size: 18px;border-radius: 5px;">
                                            البيانات الاساسيه للسند
                                        </legend>
                                        <div class="form-group">
                                            <label>رقم السند</label>
                                            <input type="id" name="name"
                                                   class="form-control"
                                                   value="{{ $new }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>مصدر السند</label>
                                            <input type="text"
                                                   value="{{isset(auth()->user()->name)?auth()->user()->name:"مدير النظام"}}"
                                                   name="receipt_issuer"
                                                   class="form-control" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label>التحصيل</label>
                                            <select name="receipt_collection_method" class="form-control">
                                                <option value="مباشر">مباشر</option>
                                            </select>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                    <fieldset class="border border-info p-2 ">
                                        <legend class="w-100 px-2 bg-info" style="font-size: 18px;border-radius: 5px;">
                                            بيانات المستلم
                                        </legend>

                                        <div class="form-group">
                                            <label>اسم المستلم</label>
                                            <input type="text" name="recipient_name"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>الهاتف</label>
                                            <input type="text" name="recipient_phone"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>العنوان</label>
                                            <input type="text" name="recipient_address"
                                                   class="form-control">
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <fieldset class="border border-secondary p-2 ">
                                        <legend class="w-100 px-2 bg-secondary"
                                                style="font-size: 18px;border-radius: 5px;">
                                            الدفع
                                        </legend>
                                        <div class="form-group">
                                            <label>نوع السند</label>
                                            <select class="form-control" name="receipt_type">
                                                <option value="نقدي">نقدي</option>
                                                <option value="فيزا">فيزا</option>
                                                <option value="شيك"> شيك</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>اسم البنك</label>
                                            <select class="form-control" name="bank_name">
                                                <option value="">برجاء تحديد البنك</option>
                                                <option value="بنك A">بنك A</option>
                                                <option value="بنك B">بنك B</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>رقم الشيك </label>
                                            <input type="text" name="check_number"
                                                   class="form-control">
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <fieldset class="border border-info p-2 ">
                                        <legend class="w-100 px-2 bg-info" style="font-size: 18px;border-radius: 5px;">
                                            الحساب الدائن
                                        </legend>
                                        <div class="form-group">
                                            <label>الحساب الدائن</label>
                                            <select class="form-control" name="receipt_credit_account">
                                                <option value="صندوق 1">صندوق 1</option>
                                                <option value="صندوق 2">صندوق 2</option>
                                                <option value="بنك A">بنك A</option>
                                                <option value="بنك B">بنك B</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>البيان / السبب </label>
                                            <textarea name="receipt_reason" class="form-control"
                                                      style="height: 125px;"></textarea>
                                        </div>

                                    </fieldset>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-hover debit-table">
                                        <tr>
                                            <th>الحساب المدين</th>
                                            <th>المبلغ</th>
                                            <th>العمله</th>
                                            <th>الضريبه</th>
                                            <th>الاجمالى</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-control" name="debit[1][name]">
                                                    <option value="مصروفات عامه">مصروفات عامه</option>
                                                    <option value="مصروفات نثريه">مصروفات نثريه</option>
                                                    <option value="مصروفات اخرى">مصروفات اخرى</option>
                                                </select>

                                            </td>
                                            <td>
                                                <input type="text" name="debit[1][amount]"
                                                       class="form-control add-to-total">
                                            </td>
                                            <td>
                                                <select class="form-control" name="debit[1][currency]">
                                                    <option value="الجنيه">الجنيه</option>
                                                    <option value="الريال">الريال</option>
                                                    <option value="الدرهم">الدرهم</option>
                                                </select>

                                            </td>
                                            <td>
                                                <select class="form-control change-tax" name="debit[1][tax]">
                                                    <option value="0">0 %</option>
                                                    <option value="10">10 %</option>
                                                    <option value="14">14%</option>
                                                </select>

                                            </td>
                                            <td>
                                                <input type="text" name="debit[1][total_amount]"
                                                       class="form-control total-for-row"
                                                       readonly>
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="col-md-12 " style="text-align: left">
                                    <a class="btn btn-sm  bg-success" id="debit-plus">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <a class="btn btn-sm bg-danger" id="debit-minus">
                                        <i class="fas fa-minus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-9 col-sm-12">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div
                                            class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" name="spacial_params"
                                                   id="customCheckbox">
                                            <label class="custom-control-label" for="customCheckbox">
                                                خاضع للضريبه
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row special-section d-none">
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <label>اسم المورد</label>
                                                <input type="text" name="supplier_name"
                                                       class="form-control" value="{{ old('supplier_name') }}">
                                                @if ($errors->has('supplier_name'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('supplier_name') }}</span>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <label>رقم المورد</label>
                                                <input type="text" name="supplier_no"
                                                       class="form-control">


                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <label>الرقم الضريبى</label>
                                                <input type="text" name="tax_number"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div
                                            class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" name="cost_center"
                                                   id="costcenter">
                                            <label class="custom-control-label" for="costcenter">
                                                اضافه مراكز التكلفه
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cost-center d-none">
                                        <div class="row cost-center-part">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>مركز التكلفه</label>
                                                    <input type="text" name="cost[1][center]"
                                                           class="form-control">

                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>النسبه</label>
                                                    <input type="text" class="cost-ratio form-control"
                                                           name="cost[1][ratio]"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>القيمه</label>
                                                    <input type="text" name="cost[1][value]"
                                                           class="form-control cost-value" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 d-flex">
                                                <div class="d-flex align-items-end">
                                                    <a href="javascript:void(0);" class="add_button text-success"
                                                       title="Add row">
                                                        <i class="fas fa-plus-square"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>الاجمالى قبل الضريبه</label>
                                        <input type="text" name="sub_total" class="form-control"
                                               readonly id="sub-total">
                                    </div>
                                    <div class="form-group">
                                        <label>اجمالى الضريبه</label>
                                        <input type="text" name="total_tax" class="form-control" id="total-tax"
                                               readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>الاجمالى </label>
                                        <input type="text" name="total_amount" id="total-amount" class="form-control"
                                               readonly>
                                    </div>
                                </div>

                            </div>

                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="submit" name="submit"
                                               value="حفظ البيانات " class="btn btn-sm  float-right">
                                    </div>
                                </div>

                            </div>

                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.main data -->


            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('js')
    <script>
        var costWrapper = $('.cost-center');
        var debitWrapper = $('.debit-table');
        var tax = 0;
        var subTotal = 0;
        var x = 100;
        var y = 100;

        $('.add_button').click(function () {
            var costHtml = '<div class="row  cost-center-part"><div class="col-sm-3"><div class="form-group"><label>مركز التكلفه</label><input type="text" name="cost[' + x + '][center]" class="form-control"></div> </div>' +
                '<div class="col-sm-3"> <div class="form-group"> <label>النسبه</label><input type="text" name="cost[' + x + '][ratio]" class="form-control cost-ratio" > </div> </div>' +
                '<div class="col-sm-3"><div class="form-group"><label>القيمه</label> <input type="text" name="cost[' + x + '][value]" class="form-control cost-value" readonly> </div> </div>' +
                '<div class="col-sm-3 d-flex"><div class="d-flex align-items-end"><a href="javascript:void(0);" class="remove_button text-danger" title="Add row"><i class="fas fa-minus-square"></i></a></div></div></div>';
            x++;
            $(costWrapper).append(costHtml);

        });
        $(costWrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this).parents('.cost-center-part').remove();
            x--;
            summary();
        });

        $('#debit-plus').on('click', function (e) {
            e.preventDefault();
            var debitHtml = '<tr>' +
                '<td ><select class="form-control" name="debit['+ y +'][name]"><option value="مصروفات عامه">مصروفات عامه</option><option value="مصروفات نثريه">مصروفات نثريه</option><option value="مصروفات اخرى">مصروفات اخرى</option></select></td>' +
                '<td><input type="text" name="debit[' + y + '][amount]" class="form-control add-to-total"></td>' +
                '<td><select class="form-control" name="debit[' + y + '][currency]"><option value="الجنيه">الجنيه</option><option value="الريال">الريال</option><option value="الدرهم">الدرهم</option></select></td>' +
                '<td><select class="form-control change-tax" name="debit[' + y + '][tax]"><option value="0">0 %</option> <option value="10">10 %</option> <option value="14">14%</option> </select> </td>' +
                ' <td><input type="text" name="debit[' + y + '][total_amount]" class="form-control total-for-row" readonly></td>' +
                '</tr>';
            y++;
            $(debitWrapper).append(debitHtml);
        });
        $('#debit-minus').on('click', function (e) {
            e.preventDefault();
            $('.debit-table tr:last:gt(0)').remove();

            if ($(".debit-table tr").length > 2) {
                $('.debit-table tr:last').remove();
            } else {
                return false;
            }
            y--;
            summary();
        });

        $('#costcenter').change(function () {
            $('.cost-center input').val("");
                $('.cost-center').toggleClass('d-none');

            }
        );
        $('#customCheckbox').change(function () {
                $('.special-section').toggleClass('d-none');
            summary();
            }
        );
        $(document).on("keyup", function () {
                $('.error-message').remove();
            }
        );
    </script>
    <script>
        $(function () {

            $(document).on('keyup', '.add-to-total', function (e) {
                var subRowAmount = parseFloat(e.target.value);
                var tax = parseFloat($(this).parents('tr').find('.change-tax').val());
                var rowTotal = (subRowAmount + subRowAmount * tax / 100).toFixed(2);
                $(this).parents('tr').find('.total-for-row').val(rowTotal);
                summary();
            });

            $(document).on('change', '.change-tax', function (e) {

                var tax = parseFloat(e.target.value);
                var subRowAmount = parseFloat($(this).parents('tr').find('.add-to-total').val());
                var rowTotal = (subRowAmount + subRowAmount * tax / 100).toFixed(2);;
                $(this).parents('tr').find('.total-for-row').val(rowTotal);
                summary();
            });


            $(document).on('keyup', '.cost-ratio', function (e) {
                var ratio = this.value;
                var totalAmount=$('#total-amount').val();
                var x = (ratio / 100 * totalAmount).toFixed(2);
                $(this).parents('.cost-center-part').find('.cost-value').val(x);
            });

        });


        function summary() {
            var totalAmount = calculateTotalAmount();
            var subTotal = calculateSubTotal();
            $('#total-amount').val(totalAmount);
            $('#sub-total').val(subTotal);
            $('#total-tax').val(totalAmount - subTotal);
            checkCostSection(totalAmount);
        };

        function calculateTotalAmount() {
            var totalAmount=0;
            document.querySelectorAll(".total-for-row").forEach(price => {
                var secValue=parseFloat(price.value);
                if(secValue > 0){
                    totalAmount += secValue;
                }
            });
            return totalAmount.toFixed(2);
        };

        function calculateSubTotal() {
            var subTotal=0;
            document.querySelectorAll(".add-to-total").forEach(price => {
                var secValue=parseFloat(price.value);
                if(secValue > 0){
                    subTotal += secValue;
                }
            });
            return subTotal.toFixed(2);
        };
        function checkCostSection(totalAmount){
            if( $('#costcenter').is(':checked')){
                document.querySelectorAll(".cost-center-part").forEach(part => {
                  var ratio=parseFloat($(part).find('.cost-ratio').val());
                  var cost=(ratio / 100 * totalAmount).toFixed(2);
                    $(part).find('.cost-value').val(cost);
                });
            }

            return false;
        }

    </script>
    <script>
        $('#add-receipt-form').on('submit', function (e) {
                e.preventDefault();
                e.stopPropagation();
                $('.error-message').remove();
                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('receipts.store')}}",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        Swal.fire(
                            'تم',
                            'تم اضافه السند بنجاح',
                            'success'
                        );

                        $('#add-receipt-form')[0].reset();

                    },
                    error: function (response) {
                        $.each(response.responseJSON.errors, function (field_name, error) {
                            if (field_name.indexOf('.') != -1) {
                                var res = field_name.split(".");

                                field_name = res[0] + "[" + res[1] + "][" + res[2] + "]";

                            }
                            $(document).find('[name="' + field_name + '"]').after('<span class="text-danger error-message">' + error + '</span>');


                        })
                    }
                });
            }
        );
    </script>
@endpush
