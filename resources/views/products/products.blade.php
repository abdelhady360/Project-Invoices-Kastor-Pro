@extends('layouts.master')
@section('title')
    المنتجات
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ المنتجات</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

@endsection
@section('content')

    <!-- row -->
    <div class="row">
    <!-- START-Messages -->
        @if(session()->has('Add'))
            <div class="alert alert-success" role="alert">
                {{session()->get('Add')}}
            </div>
        @endif
        @if(session()->has('edit'))
            <div class="alert alert-success" role="alert">
                {{session()->get('edit')}}
            </div>
        @endif
        @if(session()->has('delete'))
            <div class="alert alert-warning" role="alert">
                {{session()->get('delete')}}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
        <!-- END-Messages -->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-sm-6 col-md-4 col-xl-3">
                            <a class="modal-effect btn btn-success " data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة منتج جديد</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'>
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0"># </th>
                                <th class="wd-15p border-bottom-0">اسم المنتج</th>
                                <th class="wd-20p border-bottom-0">اسم القسم</th>
                                <th class="wd-20p border-bottom-0"> ملاحظات</th>
                                <th class="wd-15p border-bottom-0">العمليات </th>
                            </tr>
                            </thead>

                            <tbody>


                            <?php $i = 0 ?>
                                @foreach($products as $product)
                                    <?php $i++ ?>
                                    <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$product->Product_name}}</td>
                                    <td>{{$product->section->section_name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>
                                        <a class="modal-effect btn  btn-info"
                                           data-effect="effect-scale"
                                           data-product_name="{{$product->Product_name}}"
                                           data-pro_id="{{$product->id}}"
                                           data-section_name="{{$product->section->section_name}}"
                                           data-description="{{$product->description}}"
                                           data-toggle="modal"
                                           href="#exampleModal2"
                                           title="تعديل">
                                            <i class="las la-pen"></i>
                                        </a>

                                        <a class="modal-effect btn  btn-danger"
                                                data-pro_id="{{ $product->id }}"
                                                data-product_name="{{ $product->Product_name }}"
                                                data-toggle="modal"
                                                data-target="#modaldemo9"
                                                 title="حذف">
                                                <i class="las la-trash"></i>
                                        </a>

                                    </td>

                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--/div-->

        <!-- Basic modal -->
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Basic Modal</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">

                        <form action="{{request('products.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">اسم المنتج</label>
                                <input type="text" name="Product_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            <div class="form-group ">
                                <label for="inputState">اسم القسم</label>
                                <select id="inputState" name="section_id" class="form-control">
                                    <option value="" selected disabled >-- اختار القسم --</option>

                                @foreach($sections as $section)
                                        <option value="{{$section->id}}">{{$section->section_name}}</option>
                                    @endforeach

                                </select>
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">الوصف </label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>

                            <div class="modal-footer ">
                                <button class="btn btn-success" type="submit">تاكيد</button>
                                <button class="btn btn-danger" data-dismiss="modal" type="button">حذف</button>
                            </div>

                        </form>
                    </div>


                </div>
            </div>
        </div>
        <!-- End Basic modal -->

    </div>

    <!-- edit -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="products/update" method="post" autocomplete="off">
                        {{method_field('patch')}}
                        {{csrf_field()}}
                        <div class="form-group">

                            <input type="hidden" name="pro_id" id="pro_id" >

                            <label for="recipient-name" class="col-form-label">اسم القسم:</label>
                            <input class="form-control" name="Product_name" id="product_name" type="text">
                        </div>

                        <div class="form-group ">
                            <label for="inputState">اسم القسم</label>
                            <select id="section_name" name="section_name" class="form-control">
                                <option value="" selected disabled >-- اختار القسم --</option>

                                @foreach($sections as $section)
                                    <option>{{$section->section_name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">ملاحظات:</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">تاكيد</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- delete -->
    <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">حذف المنتج</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="products/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="pro_id" id="pro_id" value="">
                        <input class="form-control" name="product_name" id="product_name" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>

    <script src="{{URL::asset('assets/js/modal.js')}}"></script>

    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var product_name = button.data('product_name')
            var pro_id = button.data('pro_id')
            var section_name = button.data('section_name')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #product_name').val(product_name);
            modal.find('.modal-body #section_name').val(section_name);
            modal.find('.modal-body #description').val(description);
            modal.find('.modal-body #pro_id').val(pro_id);
        })
    </script>

    <script>

        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var pro_id = button.data('pro_id')
            var product_name = button.data('product_name')
            var modal = $(this)

            modal.find('.modal-body #pro_id').val(pro_id);
            modal.find('.modal-body #product_name').val(product_name);
        })

    </script>

@endsection
