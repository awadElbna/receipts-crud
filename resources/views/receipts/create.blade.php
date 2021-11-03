@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            اضافه سند صرف متعدد
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('home')}}">الرئيسيه </a></li>
                            <li class="breadcrumb-item active">السندات </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="col-md-12">
                <form  action="{{ route('receipts.store')}}" method="POST" id="add-receipt-form">
                    @csrf
                    <!-- start main data  -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">اضافه سند صرف جديد</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                    <fieldset class="border p-3">
                                        <legend class="w-auto px-2" style="color: #ffffff;background-color: #538586;font-size: 18px;border-radius: 8px;">البيانات الاساسيه للسند</legend>
                                        <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>رقم السند</label>
                                            <input type="id" name="name"
                                                   class="form-control"
                                                   value="{{old('id') != null ?old('id'):$new }}" readonly>
                                            @if ($errors->has('id'))
                                                <span class="text-danger">{{ $errors->first('id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>مصدر السند</label>
                                            <input type="text" value="{{isset(auth()->user()->name)?auth()->user()->name:"مدير النظام"}}"
                                                   name="receipt_issuer"
                                                   value="{{ old('receipt_issuer') }}"
                                                   class="form-control" readonly>
                                            @if ($errors->has('receipt_issuer'))
                                                <span class="text-danger">{{ $errors->first('receipt_issuer') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>التحصيل</label>
                                                    <select name="receipt_collection_method" class="form-control">
                                                        <option value="مباشر">مباشر</option>
                                                    </select>
                                                    @if ($errors->has('receipt_collection_method'))
                                                        <span class="text-danger">{{ $errors->first('receipt_collection_method') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>الحساب الدائن</label>
                                                    <select class="form-control" name="receipt_credit_account">
                                                        <option value="صندوق 1">صندوق 1</option>
                                                        <option value="صندوق 2">صندوق 2</option>
                                                        <option value="بنك A">بنك A</option>
                                                        <option value="بنك B">بنك B</option>
                                                    </select>
                                                    @if ($errors->has('receipt_credit_account'))
                                                        <span class="text-danger">{{ $errors->first('receipt_credit_account') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>البيان / السبب </label>
                                                    <input type="text" name="receipt_reason"
                                                           class="form-control"  value="{{ old('receipt_reason') }}">
                                                    @if ($errors->has('receipt_reason'))
                                                        <span class="text-danger">{{ $errors->first('receipt_reason') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                <br>
                                <fieldset class="border p-3">
                                    <legend class="w-auto px-2" style="color: #ffffff;background-color: #538586;font-size: 18px;border-radius: 8px;">طرق الدفع / بيانات المستلم</legend>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>اسم المستلم</label>
                                                <input type="text" name="recipient_name"
                                                       class="form-control" value="{{ old('recipient_name') }}">
                                                @if ($errors->has('recipient_name'))
                                                    <span class="text-danger">{{ $errors->first('recipient_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>الهاتف</label>
                                                <input type="text" name="recipient_phone"
                                                       class="form-control" value="{{ old('recipient_phone') }}">
                                                @if ($errors->has('recipient_phone'))
                                                    <span class="text-danger">{{ $errors->first('recipient_phone') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>العنوان</label>
                                                <input type="text" name="recipient_address"
                                                       class="form-control" value="{{ old('recipient_address') }}">
                                                @if ($errors->has('recipient_address'))
                                                    <span class="text-danger">{{ $errors->first('recipient_address') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>نوع السند</label>
                                                <select class="form-control" name="receipt_type">
                                                    <option value="نقدي">نقدي</option>
                                                    <option value="فيزا">فيزا</option>
                                                    <option value="شيك"> شيك </option>
                                                </select>
                                                @if ($errors->has('receipt_type'))
                                                    <span class="text-danger">{{ $errors->first('receipt_type') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>اسم البنك</label>
                                                <select class="form-control" name="bank_name">
                                                    <option >برجاء تحديد البنك</option>
                                                    <option value="بنك A">بنك A</option>
                                                    <option value="بنك B">بنك B</option>
                                                </select>
                                                @if ($errors->has('bank_name'))
                                                    <span class="text-danger">{{ $errors->first('bank_name') }}</span>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">

                                                <label>رقم الشيك </label>
                                                <input type="text" name="check_number"
                                                       class="form-control" value="{{ old('check_number') }}">
                                                @if ($errors->has('check_number'))
                                                    <span class="text-danger">{{ $errors->first('check_number') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <br>

                                <fieldset class="border p-3">
                                    <legend class="w-auto px-2" style="color: #ffffff;background-color: #538586;font-size: 18px;border-radius: 8px;">خيارات السداد / الصرف</legend>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>المبلغ</label>
                                                <input type="text" name="total_amount"
                                                       class="form-control" value="{{ old('total_amount') }}">
                                                @if ($errors->has('total_amount'))
                                                    <span class="text-danger">{{ $errors->first('total_amount') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>العمله</label>
                                                <select class="form-control" name="currency">
                                                    <option value="الجنيه">الجنيه</option>
                                                    <option value="الريال">الريال</option>
                                                    <option value="الدرهم">الدرهم</option>
                                                </select>
                                                @if ($errors->has('currency'))
                                                    <span class="text-danger">{{ $errors->first('currency') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input"
                                                           name="spacial_params"
                                                           type="checkbox"
                                                           id="customCheckbox" >
                                                    <label for="customCheckbox"
                                                           class="custom-control-label">خاضع للضريبه</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                        </div>
                                    </div>
                                    <div class="row special-section d-none">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label>اسم المورد</label>
                                                <input type="text" name="supplier_name"
                                                       class="form-control" value="{{ old('supplier_name') }}" >
                                                @if ($errors->has('supplier_name'))
                                                    <span class="text-danger">{{ $errors->first('supplier_name') }}</span>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label>رقم المورد</label>
                                                <input type="text" name="supplier_no"
                                                       class="form-control" value="{{ old('supplier_no') }}">
                                                @if ($errors->has('supplier_no'))
                                                    <span class="text-danger">{{ $errors->first('supplier_no') }}</span>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label>الرقم الضريبى</label>
                                                <input type="text" name="tax_number"
                                                       class="form-control" value="{{ old('tax_number') }}">
                                                @if ($errors->has('tax_number'))
                                                    <span class="text-danger">{{ $errors->first('tax_number') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="submit" name="submit"
                                                   value="حفظ البيانات " class="btn btn-sm  float-right">
                                        </div>
                                    </div>

                                </div>



                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.main data -->
                </form>


            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('js')
    <script>
// if($('#customCheckbox').checked ==true){
//     $('.special-section').css('display','block');
// }else{
//     $('.special-section').css('display','none');
// }

        $('#customCheckbox').change(function(){
            $('.special-section').toggleClass('d-none');
        });

        $(document).on("keyup", function(){
            $('.error-message').remove();
        });
    </script>
@endpush
