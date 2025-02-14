@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
@endsection
@section('ptrainer_id-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">اعدادات الكورس</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')


    @if(session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
				<div class="row">

                    <div class="col-xl-12">
                        <div class="card mg-b-20">
                            <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                            data-toggle="modal" href="#exampleModal">اضافة مادة</a>
                    </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table id="example1" class="table key-buttons text-md-nowrap" data-ptrainer_id-length="50">
                                <table id="example1" class="table key-buttons text-md-nowrap" data-ptrainer_id-length='50'>
                                        <thead>
                                        <tr>
                                            <th class="border-bottom-0">#</th>
                                            <th class="border-bottom-0">اسم المادة</th>
                                            <th class="border-bottom-0">القسم</th>
                                            <th class="border-bottom-0">اسم الكلية</th>
                                            <th class="border-bottom-0">المعلم</th>
                                            <th class="border-bottom-0">قيمة الاشتراك</th>
                                            <th class="border-bottom-0">العمليات</th>

                                        </tr> 
                                        </thead>
                                        <tbody>
                                        <?php $i =0?>
                                        @foreach($ClassCourses as $x)
                                            <?php $i++?>
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$x->name}}</td>
                                            <td>{{$x->debart}}</td>
                                            <td>{{$x->coleg}}</td>
                                            <td>{{$x->trainer->namefirst.' '.$x->trainer->fullname }}</td>
                                            <td>{{$x->price}}</td>
                                            <td>

                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                   
                                                       data-id="{{ $x->id }}" 
                                                       data-name="{{ $x->name }}"
                                                        data-debart="{{ $x->debart }}"
                                                       data-coleg="{{ $x->coleg }}"
                                                       data-price="{{ $x->price }}" 
                                                       data-trainer_id="{{ $x->trainer_id }}" 
                                                       data-toggle="modal" href="#exampleModal2"
                                                       title="تعديل"><i class="las la-pen"></i>
                                                    </a>

                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                       data-id="{{ $x->id }}" data-name="{{ $x->name }}" data-toggle="modal"
                                                       href="#modaldemo9" title="حذف"><i class="las la-trash"></i>
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

                    <!-- add -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">اضافة مادة</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                    <form action="{{route('ClassCourses.store')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">اسم المادة</label>
                                            <input type="text" class="form-control" id="name" name="name" required  >

                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">القسم</label>
                                            <input type="text" class="form-control" id="debart" name="debart" required  >

                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الكلية</label>
                                            <input type="text" class="form-control" id="coleg" name="coleg" required  >

                                        </div>

                                    
                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">المعلم</label>
                                        <select name="trainer_id" id="trainer_id" class="form-control" required>
                                            <option value="" selected disabled> --حدد المعلم--</option>
                                            @foreach ($trainers as $trainer)
                                                <option value="{{ $trainer->id }}">{{ $trainer->namefirst }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">قيمة الاشتراك</label>
                                            <input class="form-control" id="price" name="price" rows="3"></input>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">تاكيد</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
<!-- edit -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">تعديل المواد</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="ClassCourses/update" method="post" autocomplete="off">
                                            {{method_field('patch')}}
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <input type="hidden" name="id" id="id" value="">
                                             
                                            </div>
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">اسم المادة</label>
                                            <input type="text" class="form-control" id="name" name="name" required  >

                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">القسم</label>
                                            <input type="text" class="form-control" id="debart" name="debart" required  >

                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الكلية</label>
                                            <input type="text" class="form-control" id="coleg" name="coleg" required  >

                                        </div>


                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">المعلم</label>
                                        <select name="trainer_id" id="trainer_id" class="form-control" required>
                                            <option value="" selected disabled> --حدد المعلم--</option>
                                            @foreach ($trainers as $trainer)
                                                <option value="{{ $trainer->id }}">{{ $trainer->namefirst }}</option>
                                            @endforeach
                                        </select>
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">قيمة الاشتراك:</label>
                                                <input class="form-control" id="price" name="price"></input>
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
                    <div class="modal" id="modaldemo9">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">حذف </h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                        9+6           type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="ClassCourses/destroy" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <input type="hidden" name="id" id="id" value="">
                                        <input class="form-control" name="name" id="name" type="text" readonly>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                        <button type="submit" class="btn btn-danger">تاكيد</button>
                                    </div>
                            </div>
                            
                            </form>
                        </div>
                    </div>


                </div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
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
    <!-- Internal Prism js-->
    <script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>
    
    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var price = button.data('price')
            var debart = button.data('debart')
            var coleg = button.data('coleg')
			var trainer_id = button.data('trainer_id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #price').val(price);
            modal.find('.modal-body #debart').val(debart);
            modal.find('.modal-body #coleg').val(coleg);
			modal.find('.modal-body #trainer_id').val(trainer_id);
        })
    </script>

    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var price = button.data('price')
            var debart = button.data('debart')
            var coleg = button.data('coleg')
            var trainer_id = button.data('trainer_id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #price').val(price);
            modal.find('.modal-body #debart').val(debart);
            modal.find('.modal-body #coleg').val(coleg);
            modal.find('.modal-body #trainer_id').val(trainer_id);
	
        })
    </script>
@endsection
