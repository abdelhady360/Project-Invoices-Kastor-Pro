@extends('layouts.master')

@section('title')
    لوحة التحكم
@stop

@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')

    <!-- fetch data -->

    @php

        $Total_invoices = number_format(App\invoices::sum('Total'),2);
        $Total_driven_invoices = number_format(App\invoices::where('Value_Status',1)->sum('Total'),2);
        $Total_unpaid_invoices = number_format(App\invoices::where('Value_Status',2)->sum('Total'),2);
        $Total_partially_driven_invoices = number_format(App\invoices::where('Value_Status',3)->sum('Total'),2);

        $hit = 100;

        // count_vs_1

        $count_vs_1 = App\invoices::where('Value_Status',1)->count();
        $count_total_1 = App\invoices::count();

            if($count_vs_1 > 0){
                $Equal_1= round($count_vs_1 / $count_total_1 * $hit);

            }else{
                $Equal_1 =  0; // ./count_vs_1
            }

            // count_vs_2

        $count_vs_2 = App\invoices::where('Value_Status',2)->count();
        $count_total_2 = App\invoices::count();

        if($count_vs_1 > 0){
            $Equal_2= round($count_vs_2 / $count_total_2 * $hit);

            }else{
                $Equal_2 =  0; // ./count_vs_2
            }

            // count_vs_3

        $count_vs_3 = App\invoices::where('Value_Status',3)->count();
        $count_total_3 = App\invoices::count();

        if($count_vs_3 > 0){
            $Equal_3= round($count_vs_3 / $count_total_3 * $hit);

            }else{
                $Equal_3 =  0; // ./count_vs_3
            }

    @endphp

    <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحبا بعودتك !</h2>
						  <p class="mg-b-0">برنامج الفواتير الاحترافي - Kastor Pro</p>
						</div>
					</div>
					<div class="main-dashboard-header-right">
						<div>
							<label class="tx-13">مستوى استخدام البرنامج</label>
							<div class="main-star">
								<i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i> <span></span>
							</div>
						</div>
					</div>
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')

				<!-- row open -->
				<div class="row row-sm">

                    <!-- total invoices  -->
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-primary-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h4 class="mb-3  text-white">اجمالي الفواتير</h4>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class=" font-weight-bold mb-1 text-white"> {{ $Total_invoices }} $ </h4>
                                            <p class="mb-0 tx-12 text-white op-7">اجمالي مبالغ الفواتير</p>
										</div>
                                        <span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
											<span class="text-white op-7"> 100%</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
					</div>
                    <!-- /total invoices  -->

                    <!-- invoices unpaid -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-danger-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h4 class="mb-3  text-white">الفواتير الغير مدفوعة</h4>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white"> {{ $Total_unpaid_invoices }} $ </h4>
											<p class="mb-0 tx-12 text-white op-7">اجمالي مبالغ الفواتير</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-white"></i>
											<span class="text-white op-7"> {{ $Equal_2 }}% </span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
						</div>
					</div>
                    <!-- /invoices unpaid -->

                    <!-- invoices paid -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-success-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h4 class="mb-3  text-white">الفواتير المدفوعة</h4>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white"> {{ $Total_driven_invoices }} $ </h4>
											<p class="mb-0 tx-12 text-white op-7">اجمالي مبالغ الفواتير</p>
										</div>
										<span class="float-right my-auto mr-auto">
                                            <i class="fas fa-arrow-circle-up text-white"></i>
                                            <span class="text-white op-7"> {{ $Equal_1 }}% </span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
						</div>
					</div>
                    <!-- /invoices paid -->

                    <!-- invoices Partially paid -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-warning-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h4 class="mb-3  text-white">الفواتير المدفوعة جزئيا</h4>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white"> {{ $Total_partially_driven_invoices }} $ </h4>
											<p class="mb-0 tx-12 text-white op-7">اجمالي مبالغ الفواتير</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-white"></i>
											<span class="text-white op-7"> {{ $Equal_3 }}% </span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
					</div>
                    <!-- /invoices Partially paid -->

				</div>
				<!-- /row  -->

				<!-- row open -->
				    <div class="row row-sm">
                        <!-- Graph invoices  -->
                        <div class="col-md-12 col-lg-12 col-xl-6">
						<div class="card">
							<div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-0">رسم بياني للفواتير</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 text-muted mb-0">برنامج الفواتير الاحترافي - Kastor Pro  .</p>
							</div>
							<div class="card-body"> {!! $chartjs2->render() !!} </div>
						</div>
					</div>
                        <!-- division invoices  -->
					<div class="col-lg-12 col-xl-6">
						<div class="card card-dashboard-map-one">
							<label class="main-content-label"> الحصة من الفواتير</label>
							<span class="d-block mg-b-20 text-muted tx-12">برنامج الفواتير الاحترافي - Kastor Pro  .</span>
							<div class=""> {!! $chartjs->render() !!} </div>
						</div>
					</div>
				</div>
                <!-- /division invoices  -->

                <!-- row opened -->
                    <div class="row row-sm row-deck">
                        <!-- Total stats invoices -->
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="card card-table-two">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title mb-1"> اجمالي احصائيات الفواتير</h4>
                                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                                </div>
                                <span class="tx-12 tx-muted mb-12 "></span>
                                <div class="table-responsive country-table">
                                    <table class="table table-striped table-bordered  text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="wd-lg-25p"><h4><b>نوع الفاتوره</b></h4></th>
                                                <th class="wd-lg-25p tx-right"><h4><b>عدد الفواتير</b></h4></th>
                                                <th class="wd-lg-25p tx-right"><h4><b>اجمالي المبلغ</b></h4> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><h6><b>الفواتير مدفوعة</b></h6></td>
                                                <td class="tx-right tx-medium tx-inverse"><h6>{{$count_vs_1}}فواتير </h6> </td>
                                                <td class="tx-right tx-medium tx-inverse"><h6>{{ $Total_driven_invoices }} $ </h6></td>
                                            </tr>
                                            <tr>
                                                <td><h6><b>الفواتير مدفوعة جزئيا</b></h6></td>
                                                <td class="tx-right tx-medium tx-inverse"><h6>{{$count_vs_3}} فواتير</h6></td>
                                                <td class="tx-right tx-medium tx-inverse"><h6>{{ $Total_partially_driven_invoices }} $ </h6></td>
                                            </tr>
                                            <tr>
                                                <td><h6><b>الفواتير غير مدفوعة</b></h6></td>
                                                <td class="tx-right tx-medium tx-inverse"><h6>{{$count_vs_2}}  فواتير</h6></td>
                                                <td class="tx-right tx-medium tx-inverse"><h6>{{ $Total_unpaid_invoices }} $ </h6></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /Total stats invoices -->
                    </div>
                <!-- /row -->
		    </div>
		</div>
                <!-- end row open -->
@endsection

@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('assets/js/index.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>
@endsection
