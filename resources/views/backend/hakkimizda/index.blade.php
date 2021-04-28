@extends('backend.layout')
@section('content')
    <div class="right_col" role="main" style="min-height: 1846px;">
        <div class="row">
            <div class="col-md-12 col-sm-4 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="dashboard-widget-content">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Hakkımızda Ayarları</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br>
                                    <form action="{{route('hakkimizda.update',$hakkimizda->id)}}" method="POST" id="demo-form2"
                                          data-parsley-validate="" class="form-horizontal form-label-left">
                                        @CSRF
                                        @method('PUT')

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Başlık
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" name="hakkimizda_baslik"
                                                       value="{{$hakkimizda->hakkimizda_baslik}}" required="required"
                                                       class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea class="form-control" id="editor1"
                                                           name="hakkimizda_icerik">{{$hakkimizda->hakkimizda_icerik}}</textarea>
                                                <script>
                                                    CKEDITOR.replace('hakkimizda_icerik');
                                                </script>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Video
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" name="hakkimizda_video"
                                                       value="{{$hakkimizda->hakkimizda_video}}" required="required"
                                                       class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vizyon
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" name="hakkimizda_vizyon"
                                                       value="{{$hakkimizda->hakkimizda_vizyon}}"
                                                       required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Misyon
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" name="hakkimizda_misyon"
                                                       value="{{$hakkimizda->hakkimizda_misyon}}"
                                                       required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>


                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" class="btn btn-success">
                                                    Güncelle
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('css')  @endsection
@section('js')   @endsection
