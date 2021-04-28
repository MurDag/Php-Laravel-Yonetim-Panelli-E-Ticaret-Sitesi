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
                                    <h2>Genel Ayarlar</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br>

                                    <form action="{{route('genelAyarlar.update',$ayar->id)}}" method="POST" enctype="multipart/form-data" data-parsley-validate="" class="form-horizontal form-label-left">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Yüklü Logo<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                <img width="200" src="{{ asset('') }}/images/backend/settings/{{$ayar->ayar_logo}}">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Resim Seç <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="file"   name="ayar_logo" class="form-control col-md-7 col-xs-12" required>
                                            </div>
                                        </div>

                                        <input type="hidden" name="eski_logo" value="{{$ayar->ayar_logo}}">

                                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">Güncelle</button>
                                        </div>

                                    </form>

                                    <hr>

                                    <form action="{{route('genelAyarlar.update',$ayar->id)}}" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Site Başlığı <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text"   name="ayar_title" value="{{$ayar->ayar_title}}" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Site Açıklaması <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text"   name="ayar_description" value="{{$ayar->ayar_description}}"  required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Site Anahtar Kelime <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text"   name="ayar_keywords"  value="{{$ayar->ayar_keywords}}" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Site Yazar <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text"   name="ayar_author" value="{{$ayar->ayar_author}}"  required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" class="btn btn-success">Güncelle</button>
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
@section('js')  @endsection
