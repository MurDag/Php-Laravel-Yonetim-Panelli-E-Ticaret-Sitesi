@extends('backend.layout')
@section('content')
    <div class="right_col" role="main" style="min-height: 1846px;">
        <div class="row">
            <div class="col-md-12 col-sm-4 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Sosya Medya Ayarları</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <form action="{{route('sosyalAyarlar.update',$ayar->id)}}" method="POST" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left">
                            @CSRF
                            @method('PUT')
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Facebook<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" placeholder="Facebook adresinizi giriniz..." name="ayar_facebook" value="{{$ayar->ayar_facebook}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Twitter<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" placeholder="Twitter adresinizi giriniz..." name="ayar_twitter" value="{{$ayar->ayar_twitter}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Youtube<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" placeholder="Google adresinizi giriniz..." name="ayar_youtube" value="{{$ayar->ayar_youtube}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Google<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" placeholder="Google adresinizi giriniz..." name="ayar_google" value="{{$ayar->ayar_google}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Güncelle</button>
                            </div>

                        </form>



                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('css')  @endsection
@section('js')  @endsection
