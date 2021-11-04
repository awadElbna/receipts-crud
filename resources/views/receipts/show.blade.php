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
                            <li class="breadcrumb-item active"> عرض تفاصيل السندات #{{$receipt->id }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-main-tab"
                   data-toggle="tab" href="#nav-main" role="tab" aria-controls="nav-main" aria-selected="true">
                    البيانات الاساسيه للسند
                </a>
                <a class="nav-item nav-link" id="nav-pay-tab"
                   data-toggle="tab" href="#nav-pay" role="tab" aria-controls="nav-pay" aria-selected="true">
                     السداد / الصرف
                </a>
                <a class="nav-item nav-link" id="nav-cost-tab"
                   data-toggle="tab" href="#nav-cost" role="tab" aria-controls="nav-cost" aria-selected="false">
                    بيانات مراكز التكلفه
                </a>
                <a class="nav-item nav-link" id="nav-tax-tab"
                   data-toggle="tab" href="#nav-tax" role="tab" aria-controls="nav-tax" aria-selected="false">
                    الضريبه
                </a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-main" role="tabpanel" aria-labelledby="nav-main-tab">

                {{$receipt}}
            </div>
            <div class="tab-pane fade" id="nav-pay" role="tabpanel" aria-labelledby="nav-pay-tab">

                {{$receipt->debitAccounts}}
            </div>
            <div class="tab-pane fade" id="nav-cost" role="tabpanel" aria-labelledby="nav-cost-tab">
                {{$receipt->costs}}
            </div>
            <div class="tab-pane fade" id="nav-tax" role="tabpanel" aria-labelledby="nav-tax-tab">
                {{$receipt->supplier_name}}
            </div>
        </div>
        </section>
        <!--end  Main content -->
    </div>
@endsection
