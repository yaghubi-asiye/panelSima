@extends('layouts/dashboard')

@section('headerscripts')
<link rel="stylesheet" type="text/css" href="/css/plugins/forms/wizard.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/selects/selectize.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/selects/selectize.default.css">
<link rel="stylesheet" type="text/css" href="/css/plugins/forms/selectize/selectize.css">

<link rel="stylesheet" type="text/css" href="/css/plugins/forms/selectize/selectize.css">
<!-- Timetable CSS Files -->
<link rel="stylesheet" href="vendors/timetables/css/magnific-popup.css">
<link rel="stylesheet" href="vendors/timetables/css/timetable.css">

<link rel="stylesheet" type="text/css" href="/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/toggle/switchery.min.css">

<!--------------------------------------------------->

<!----------- CSS Files for example -------------->
<link href="/vendors/timetables/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<link href="/vendors/timetables/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
<link href="/css/bootstrap-glyphicons.css" rel="stylesheet" type="text/css" />



<style media="screen">

#YTO {
  font-size: 16px!important;
  width: 100%!important;
  direction: ltr!important;
  font-family: Byekan!important;
  height: 500px!important;
}
#OTY {
  font-size: 16px!important;
  width: 100%!important;
  direction: ltr!important;
  font-family: Byekan!important;
  height: 500px!important;
}

tspan{
  font-size: 16px!important;

}
.dataTables_wrapper{
  direction: rtl;
}


</style>
@endsection

@section('content')

<!--  Start Add Task PopUp -->
<div class="modal fade text-left" id="addTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div   class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17">افزودن فعالیت</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="font-family:Byekan; direction: rtl" class="modal-body">

        <form  style="vertical-align:center;text-align:center" method="post" enctype="multipart/form-data" action="Tdl/addTdl" class="form form-horizontal form-bordered striped-rows">
          @csrf
          <div class="form-body">


            <div class="form-group row">
              <label class="col-md-3 label-control" for="name">نام فعالیت <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <input type="text" id="name"   class="form-control" name="name">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="description">شرح </label>
              <div class="col-md-9">
                <textarea class="form-control" name="description" rows="3" cols="30"></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="assignedTo">متولی انجام <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">

                <select id="selectize-state" name="assignedTo" class="selectize-event required">
                  <option class="" value="">انتخاب متولی</option>
                  @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name . " " . $user->family }} | {{ $user->position }}</option>
                  @endforeach
                </select>

              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="priority">اهمیت <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <select class="form-control" name="priority" >
                  <option class="form-control" value="عادی">عادی</option>
                  <option class="form-control" value="متوسط">متوسط</option>
                  <option class="form-control" value="آنی">آنی</option>
                  <option class="form-control" value="فوری">فوری</option>
                </select>
              </div>

            </div>


            <div  class="form-group row last">
              <label class="col-md-3 label-control" for="assignerAttachment">فایل ضمیمه</label>
              <div class="col-md-9">
                <input type="file" id="assignerAttachment" class="form-control" name="assignerAttachment">
              </div>
            </div>



          </div>


          <div class="form-actions">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-check-square-o"></i> افزودن فعالیت
            </button>


            <button type="button" class="btn btn-warning mr-1">
              <i class="ft-x"></i> لغو
            </button>
          </div>
        </form>


      </div>
    </div>
  </div>
</div>
<!--  End Add Task PopUp -->





<!--  Start Edit Task Assigned to Me -->
@foreach($tdlsAssignedToThisUser as $tdlAssignedToThisUser)
<div style="font-family:Byekan" class="modal fade text-left" id="editTdl{{ $tdlAssignedToThisUser->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $tdlAssignedToThisUser->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div style="text-align: center!important;" class="modal-header">
        <h4 style="text-align: center!important;" class="modal-title" id="myModalLabel{{ $tdlAssignedToThisUser->id }}">بروزرسانی فعالیت</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  style=" direction: rtl;" class="modal-body">
        <form style="vertical-align:center;text-align:center" method="post" action="Tdl/updateFromDoer"  enctype="multipart/form-data" class="form form-horizontal form-bordered striped-rows">
          @csrf
          <div class="form-body">


            <div style="display:none" class="form-group row">
              <label class="col-md-3 label-control" for="id">ردیف</label>
              <div class="col-md-9">
                <input type="text" id="id" value="{{ $tdlAssignedToThisUser->id }}" class="form-control" name="id" >
              </div>
            </div>



            <div class="form-group row">
              <label class="col-md-3 label-control" for="name">نام فعالیت</label>
              <div class="col-md-9">
                <input type="text" id="name" value="{{ $tdlAssignedToThisUser->name }}" class="form-control" name="name" disabled>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="description">شرح</label>
              <div class="col-md-9">
                <textarea class="form-control" name="description" rows="3" cols="30" disabled >{{ $tdlAssignedToThisUser->description }}</textarea>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="assignerName">ارجاع دهنده</label>
              <div class="col-md-9">
                <input type="text" id="assignerName" value="{{ $tdlAssignedToThisUser->assignerName }}" class="form-control" name="assignerName" disabled>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="priority">اهمیت</label>
              <div class="col-md-9">
                <input type="text" id="priority" value="{{ $tdlAssignedToThisUser->priority }}" class="form-control" name="priority" disabled>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="status">آخرین وضعیت <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <select class="form-control" name="status">
                  <option class="form-control" {{ $tdlAssignedToThisUser->status == 'درحال انجام' ? 'selected' : "" }} value="درحال انجام"> درحال انجام </option>
                  <option class="form-control" {{ $tdlAssignedToThisUser->status == 'انجام شده' ? 'selected' : "" }} value="انجام شده">انجام شده</option>
                  <option class="form-control" {{ $tdlAssignedToThisUser->status == 'متوقف' ? 'selected' : "" }} value="متوقف">متوقف</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="holdPoint">دلیل عدم تحقق <sup style="color: red; font-size: 18px" >*</sup></label>
              <div class="col-md-9">
                <input type="text" id="holdPoint" value="{{ $tdlAssignedToThisUser->holdPoint }}" class="form-control" name="holdPoint">
              </div>
            </div>

            <div class="form-group row last">
              <label class="col-md-3 label-control" for="doerDescription">نتیجه<sup style="color: red; font-size: 18px" >*</sup></label>
              <div class="col-md-9">
                <textarea class="form-control" name="doerDescription" rows="3" cols="30">{{ $tdlAssignedToThisUser->doerDescription }}</textarea>
              </div>
            </div>


            <div  class="form-group row last">
              <label class="col-md-3 label-control" for="doerAttachment">فایل ضمیمه</label>
              <div class="col-md-9">
                <input type="file" id="doerAttachment" class="form-control" name="doerAttachment">
              </div>
            </div>







            <p style="padding: 30px; color: red;" > * درصورت اتمام کار فرم زیر را تکمیل فرمایید * </p>


            <div class="form-group row">
              <label class="col-md-3 label-control"  for="startHour">ساعت شروع <sup style="color: red; font-size: 18px" >*</sup></label>
              <div class="col-md-9">
                <input type="text" id="startHour"  placeholder="مثال: 12:10" class="form-control" name="startHour">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control"  for="endHour">ساعت پایان <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">

                <input type="text" id="endHour"  placeholder="مثال: 10:25" class="form-control" name="endHour">

              </div>
            </div>





          </div>



          <div class="form-actions">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-check-square-o"></i> بروزرسانی
            </button>

            <button type="button" class="btn btn-warning mr-1">
              <i class="ft-x"></i> لغو
            </button>

          </div>
        </form>


      </div>
    </div>
  </div>
</div>
@endforeach
<!--  End Edit Task Assigned to Me -->





<!--  Start Edit Task Assigned to Other -->
@foreach($tdlsAssignedToOther as $tdlAssignedToOther)
<div class="modal fade text-left" id="EditOtherTask{{ $tdlAssignedToOther->id }}" tabindex="-1" role="dialog" aria-labelledby="EditOtherTask{{ $tdlAssignedToOther->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div   class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17">بروزرسانی فعالیت</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="font-family:Byekan; direction: rtl" class="modal-body">

        <form  style="vertical-align:center;text-align:center" method="post" enctype="multipart/form-data" action="/Tdl/updateAssignedToOther" class="form form-horizontal form-bordered striped-rows">
          @csrf
          <div class="form-body">


            <div class="form-group row">
              <label class="col-md-3 label-control" for="name">نام فعالیت <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <input type="text" id="name" value=" {{ $tdlAssignedToOther->name  }} "  class="form-control" name="name">
              </div>
            </div>

            <input style="display: none" value="{{  $tdlAssignedToOther->id }}" name="id" hidden type="text">

            <div class="form-group row">
              <label class="col-md-3 label-control" for="description">شرح </label>
              <div class="col-md-9">
                <textarea class="form-control" name="description" rows="3" cols="30">{{ $tdlAssignedToOther->description  }}</textarea>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="assignedTo">متولی انجام <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">

                <select id="selectize-state" name="assignedTo" class="selectize-event required">
                  <option class="" value="">انتخاب متولی</option>
                  @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $tdlAssignedToOther->user_id == $user->id ? "selected"  : "" }} >{{ $user->name . " " . $user->family }} | {{ $user->position }}</option>
                  @endforeach
                </select>

              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="priority">اهمیت <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <select class="form-control" name="priority" >
                  <option class="form-control" {{  $tdlAssignedToOther->priority == "عادی" ? "selected"  : ""  }}  value="عادی">عادی</option>
                  <option class="form-control" {{  $tdlAssignedToOther->priority == "متوسط" ? "selected"  : ""  }} value="متوسط">متوسط</option>
                  <option class="form-control" {{  $tdlAssignedToOther->priority == "آنی" ? "selected"  : ""  }} value="آنی">آنی</option>
                  <option class="form-control" {{  $tdlAssignedToOther->priority == "فوری" ? "selected"  : ""  }} value="فوری">فوری</option>
                </select>
              </div>

            </div>

            <div  class="form-group row last">
              <label class="col-md-3 label-control" for="assignerAttachment">فایل ضمیمه</label>
              <div class="col-md-9">
                <input type="file" id="assignerAttachment" class="form-control" name="assignerAttachment">
              </div>
            </div>



          </div>


          <div class="form-actions">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-check-square-o"></i> افزودن فعالیت
            </button>


            <button type="button" class="btn btn-warning mr-1">
              <i class="ft-x"></i> لغو
            </button>
          </div>
        </form>


      </div>
    </div>
  </div>
</div>
@endforeach
<!--  End Edit Task Assigned to Other -->



<!--  Start ReferralsTdl -->
@foreach($tdlsAssignedToThisUser as $tdlAssignedToThisUser)
<div style="font-family:Byekan" class="modal fade text-left" id="ReferralsTdl{{ $tdlAssignedToThisUser->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $tdlAssignedToThisUser->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div style="text-align: center!important;" class="modal-header">
        <h4 style="text-align: center!important;" class="modal-title" id="ReferralsTdl{{ $tdlAssignedToThisUser->id }}">ارجاع فعالیت به دیگران</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  style=" direction: rtl;" class="modal-body">
        <form style="vertical-align:center;text-align:center" method="post" action="Tdl/updateDoer"  enctype="multipart/form-data" class="form form-horizontal form-bordered striped-rows">
          @csrf
          <div class="form-body">

            <div style="display:none" class="form-group row">
              <label class="col-md-3 label-control" for="id">ردیف</label>
              <div class="col-md-9">
                <input type="text" id="id" value="{{ $tdlAssignedToThisUser->id }}" class="form-control" name="id" >
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="assignedTo">متولی انجام <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">

                <select id="selectize-state" name="assignedTo" class="selectize-event required">
                  <option class="" value="">انتخاب متولی</option>
                  @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name . " " . $user->family }} | {{ $user->position }}</option>
                  @endforeach
                </select>

              </div>
            </div>




          </div>



          <div class="form-actions">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-check-square-o"></i> بروزرسانی
            </button>

            <button type="button" class="btn btn-warning mr-1">
              <i class="ft-x"></i> لغو
            </button>

          </div>
        </form>


      </div>
    </div>
  </div>
</div>
@endforeach
<!--  End ReferralsTdl -->




<!--  Body -->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- project stats -->

      @if ($errors->any())
      <div style="font-family:Byekan" class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif


      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                    <div class="pb-1">
                      <div class="clearfix mb-1">
                        <i class="ft-clipboard font-large-1 blue-grey float-left mt-1"></i>
                        <span class="font-large-1 text-bold-300 info float-right">{{ $box['1'] }}</span>
                      </div>
                      <div style="text-align: center;font-size: 18px;" class="clearfix">
                        <span class="text-muted">فعالیت های محول شده امروز به شما</span>
                      </div>
                    </div>
                    <div class="progress mb-0" style="height: 7px;">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                    <div class="pb-1">
                      <div class="clearfix mb-1">
                        <i class="ft-check-circle font-large-1 blue-grey float-left mt-1"></i>
                        <span class="font-large-1 text-bold-300 info float-right">{{ $box['2'] }}</span>
                      </div>
                      <div style="text-align: center;font-size: 18px;" class="clearfix">
                        <span class="text-muted">فعالیت های انجام شده امروز شما</span>
                      </div>
                    </div>
                    <div class="progress mb-0" style="height: 7px;">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>



                  <div class="col-lg-3 col-sm-12">
                    <div class="pb-1">
                      <div class="clearfix mb-1">
                        <i class="ft-check-circle font-large-1 blue-grey float-left mt-1"></i>
                        <span class="font-large-1 text-bold-300 warning float-right"> {{ $box['5'] }} </span>
                      </div>
                      <div style="text-align: center;font-size: 18px;" class="clearfix">
                        <span class="text-muted">فعالیت های محول شده این ماه به شما</span>
                      </div>
                    </div>
                    <div class="progress mb-0" style="height: 7px;">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-12">
                    <div class="pb-1">
                      <div class="clearfix mb-1">
                        <i class="ft-clipboard font-large-1 blue-grey float-left mt-1"></i>
                        <span class="font-large-1 text-bold-300 warning float-right"> {{ $box['6'] }} </span>
                      </div>
                      <div style="text-align: center;font-size: 18px;" class="clearfix">
                        <span class="text-muted">فعالیت های انجام شده این ماه شما</span>
                      </div>
                    </div>
                    <div class="progress mb-0" style="height: 7px;">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Start Chart -->
      <section>
        <div  class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">وضعیت فعالیت های ارجاع شده به شما</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                  <div style="direction: ltr!important;" id="OTY"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">وضعیت فعالیت های ایجاد شده توسط شما</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                  <div style="direction: ltr!important;" id="YTO"></div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>
      <!--  End Chart -->









      <!-- Start My Assigned Tasks To Other Table -->
      <section>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">فعالیت های ارجاع داده شده از طرف شما به دیگران</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content collapse show">
                <button  style="float: right;margin-right: 40px!important;"   class="btn btn-success btn-min-width mr-1 mb-1 ladda-button"  data-target="#addTask" data-toggle="modal" ><span class="ladda-label">  <i class="icon-plus"></i>  افزودن فعالیت  </span></button><br><br>
                <div class="card-body card-dashboard">
                  <p class="card-text">در این قسمت میتوانید فعالیت هایی که به دیگران ارجاع داده اید را بررسی نمایید.</p>
                  <table style="font-family:Byekan;direction: rtl" class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                    <thead>
                      <tr style="text-align: center;">
                        <th>ردیف</th>
                        <th>نام فعالیت</th>
                        <th>شرح</th>
                        <th>ارجاع دهنده</th>
                        <th>متولی انجام</th>
                        <th>اهمیت</th>
                        <th>آخرین وضعیت</th>
                        <th>دلیل عدم تحقق</th>
                        <th>نتیجه</th>
                        <th>مستندات ارجاع دهنده</th>
                        <th>مستندات متولی انجام</th>
                        <th>تاریخ ایجاد</th>
                        <th>آخرین بروزرسانی</th>
                        <th>بروزرسانی</th>
                      </tr>
                    </thead>
                    <tbody style="text-align: center" >

                      @foreach($tdlsAssignedToOther as $tdlAssignedToOther)
                      <tr>
                        <td>{{ $tdlAssignedToOther->id }}</td>
                        <td>{{ $tdlAssignedToOther->name }}</td>
                        <td>{{ $tdlAssignedToOther->description }}</td>
                        <td>{{ $tdlAssignedToOther->assignerName }}</td>
                        <td>{{ $tdlAssignedToOther->user->name . " " . $tdlAssignedToOther->user->family }}</td>
                        <td><span class="badge badge-danger">{{ $tdlAssignedToOther->priority }}</span></td>
                        <td><span class="badge {{ $tdlAssignedToOther->status == 'انجام شده' ? 'badge-success' : 'badge-warning' }}">{{ $tdlAssignedToOther->status }}</span></td>
                        <td>{{ $tdlAssignedToOther->holdPoint }}</td>
                        <td>{{ $tdlAssignedToOther->doerDescription }}</td>
                        <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA; " ><a target="_blank" href="{{ $tdlAssignedToOther->assignerAttachment }}"> {!! $tdlAssignedToOther->assignerAttachment !== "storage/TdlAttachments/nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a></td>
                        <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA; " ><a target="_blank" href="{{ $tdlAssignedToOther->doerAttachment }}"> {!! $tdlAssignedToOther->doerAttachment !== "storage/TdlAttachments/nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a></td>
                        <td style="direction: ltr" >{{ jdate($tdlAssignedToOther->created_at) }}</td>
                        <td style="direction: ltr" >{{ jdate($tdlAssignedToOther->updated_at) }}</td>
                        <td style="text-align:center;" > <a href="/Tdl/delete/{{ $tdlAssignedToOther->id }}" ><i style="font-size: 20px;color: red" class="ft-x-square"></i></a>   <a data-toggle="modal" data-target="#EditOtherTask{{ $tdlAssignedToOther->id }}" ><i style="font-size: 20px; color: #3BAFDA" class="ft-edit"></i></a>  </td>

                      </tr>
                      @endforeach




                    </tbody>
                    <tfoot>
                      <tr style="text-align: center;">
                        <th>ردیف</th>
                        <th>نام فعالیت</th>
                        <th>شرح</th>
                        <th>ارجاع دهنده</th>
                        <th>متولی انجام</th>
                        <th>اهمیت</th>
                        <th>آخرین وضعیت</th>
                        <th>دلیل عدم تحقق</th>
                        <th>نتیجه</th>
                        <th>مستندات ارجاع دهنده</th>
                        <th>مستندات متولی انجام</th>
                        <th>تاریخ ایجاد</th>
                        <th>آخرین بروزرسانی</th>
                        <th>حذف</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


      </section>
      <!--  End My Assigned Tasks To Other Table -->





            <!--  My Tasks Table (Activities Assigned To Me) -->
            <section>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">فعالیت های ارجاع داده شده به شما</h4>
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                        <ul class="list-inline mb-0">
                          <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                          <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                          <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                          <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-content collapse show">
                      <div class="card-body card-dashboard">
                        <p class="card-text">لیست ذیل شامل تمامی فعالیت های ارجاع داده شده توسط دیگران به شما میباشد. شما میتوانید با کلیک برروی آیکون تغییرات فعالیت مورد نظر را بروزرسانی کنید.</p>
                        <table style="font-family:Byekan;direction: rtl" class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                          <thead>
                            <tr style="text-align: center;">
                              <th>ردیف</th>
                              <th>نام فعالیت</th>
                              <th>شرح</th>
                              <th>ارجاع دهنده</th>
                              <th>اهمیت</th>
                              <th>آخرین وضعیت</th>
                              <th>ارجاع </th>
                              <th>دلیل عدم تحقق</th>
                              <th>نتیجه</th>
                              <th>مستندات ارجاع دهنده</th>
                              <th>مستندات متولی انجام</th>
                              <th>تاریخ ایجاد</th>
                              <th>آخرین بروزرسانی</th>
                              <th>بروزرسانی</th>
                            </tr>
                          </thead>
                          <tbody style="text-align: center" >

                            @foreach($tdlsAssignedToThisUser as $tdlAssignedToThisUser)
                            <tr>
                              <td>{{ $tdlAssignedToThisUser->id }}</td>
                              <td>{{ $tdlAssignedToThisUser->name }}</td>
                              <td>{{ $tdlAssignedToThisUser->description }}</td>
                              <td>{{ $tdlAssignedToThisUser->assignerName }}</td>
                              <td><span class="badge badge-danger">{{ $tdlAssignedToThisUser->priority }}</span></td>
                              <td><span class="badge {{ $tdlAssignedToThisUser->status == 'انجام شده' ? 'badge-success' : 'badge-warning' }}">{{ $tdlAssignedToThisUser->status }}</span></td>
                              <td style="text-align:center;color: #3BAFDA" > <a data-toggle="modal" data-target="#ReferralsTdl{{ $tdlAssignedToThisUser->id }}" ><i style="font-size: 20px" class="ft-external-link"></i></a>  </td>
                              <td>{{ $tdlAssignedToThisUser->holdPoint }}</td>
                              <td>{{ $tdlAssignedToThisUser->doerDescription }}</td>
                              <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA; " ><a target="_blank" href="{{ $tdlAssignedToThisUser->assignerAttachment }}"> {!! $tdlAssignedToThisUser->assignerAttachment !== "storage/TdlAttachments/nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a></td>
                              <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA; " ><a target="_blank" href="{{ $tdlAssignedToThisUser->doerAttachment }}"> {!! $tdlAssignedToThisUser->doerAttachment !== "storage/TdlAttachments/nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a></td>
                              <td style="direction: ltr" >{{ jdate($tdlAssignedToThisUser->created_at) }}</td>
                              <td style="direction: ltr" >{{ jdate($tdlAssignedToThisUser->updated_at) }}</td>
                              <td style="text-align:center;color: #3BAFDA" > <a data-toggle="modal" data-target="#editTdl{{ $tdlAssignedToThisUser->id }}" ><i style="font-size: 20px" class="ft-edit"></i></a>  </td>

                            </tr>
                            @endforeach




                          </tbody>
                          <tfoot>
                            <tr style="text-align: center;">
                              <th>ردیف</th>
                              <th>نام فعالیت</th>
                              <th>شرح</th>
                              <th>ارجاع دهنده</th>
                              <th>اهمیت</th>
                              <th>آخرین وضعیت</th>
                              <th>ارجاع</th>
                              <th>دلیل عدم تحقق</th>
                              <th>نتیجه</th>
                              <th>مستندات ارجاع دهنده</th>
                              <th>مستندات متولی انجام</th>
                              <th>تاریخ ایجاد</th>
                              <th>آخرین بروزرسانی</th>
                              <th>بروزرسانی</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            </section>
            <!--  End My Tasks Table -->






    </div>
  </div>
</div>


@section('footerscripts')
<script src="vendors/timetables/js/jquery.min.js"></script>
<script src="vendors/timetables/js/jquery.magnific-popup.js"></script>
<script src="vendors/timetables/js/timetable.js"></script>

<script src="/vendors/js/extensions/jquery.steps.min.js" type="text/javascript"></script>
<script src="/vendors/js/forms/validation/jquery.validate.min.js" type="text/javascript"></script>
<script src="/js/scripts/forms/wizard-steps.js" type="text/javascript"></script>


<script src="/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>


<script src="/vendors/js/forms/select/selectize.min.js" type="text/javascript"></script>
<script src="/js/core/libraries/jquery_ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="/js/scripts/forms/select/form-selectize.js" type="text/javascript"></script>

<script src="/vendors/timetables/js/moment.min.js"></script>
<script src="/vendors/timetables/js/bootstrap-datetimepicker.min.js"></script>








<script type="text/javascript">
jQuery(document).ready(function() {

  // hide last wizard submit button
  $("[href=#finish]").hide();


  jQuery('.btn-delete-admin').click(function(e){
    alert("This admin user can't be deleted !");
    e.preventDefault();
  });

  jQuery('.btn-delete').click(function(e){
    var question = 'Are you sure you want to delete this ?';
    if (!confirm(question)) {
      e.preventDefault();
    }
  });

  // Date picker
  jQuery('.date-picker').datetimepicker({
    format: 'DD-MM-YYYY'
  });

  // Time picker
  jQuery('.time-picker').datetimepicker({
    format: 'HH:mm'
  });
});

</script>

<script>


var chart = AmCharts.makeChart( "YTO", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [

    {
      "country": 'متوقف',
      "litres": {{ $chart['ytoMotevaghef'] }}
    },{
      "country": 'انجام شده',
      "litres": {{ $chart['ytoAnjamshode'] }}
    },{
      "country": 'درحال انجام',
      "litres": {{ $chart['ytoDarhaaleanjam'] }}
    },{
      "country": 'بررسی نشده',
      "litres": {{ $chart['ytoBarresinashode'] }}
    },

  ],
  "valueField": "litres",
  "titleField": "country",
  "balloon":{
    "fixedPosition":true
  },
  "export": {
    "enabled": true
  }
} );


var chart = AmCharts.makeChart( "OTY", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [

    {
      "country": 'متوقف',
      "litres": {{ $chart['otuMotevaghef'] }}
    },{
      "country": 'انجام شده',
      "litres": {{ $chart['otuAnjamshode'] }}
    },{
      "country": 'درحال انجام',
      "litres": {{ $chart['otuDarhaaleanjam'] }}
    },{
      "country": 'بررسی نشده',
      "litres": {{ $chart['otuBarresinashode'] }}
    },

  ],
  "valueField": "litres",
  "titleField": "country",
  "balloon":{
    "fixedPosition":true
  },
  "export": {
    "enabled": true
  }
} );


</script>


@endsection
