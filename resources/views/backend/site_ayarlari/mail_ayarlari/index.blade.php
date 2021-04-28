@extends('backend.layout')
@section('content')
    <div class="right_col" role="main" style="min-height: 1846px;">
        <div class="row">
            <div class="col-md-12 col-sm-4 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Smtp Mail Ayarları</h2>
                        <ul class="nav navbar-right panel_toolbox"></ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <form action="{{route('mailAyar.update',$ayar->id)}}" method="POST" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left">
                            @CSRF
                            @method('PUT')
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">MailSmtp Host<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" placeholder="Mail smtp host adresinizi giriniz..." name="ayar_smtphost" value="{{$ayar->ayar_smtphost}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail Adresiniz<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" placeholder="Mail adresinizi giriniz..." name="ayar_smtpuser" value="{{$ayar->ayar_smtpuser}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail Şifreniz<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="first-name" placeholder="Mail şifrenizi giriniz..." name="ayar_smtppassword" value="{{$ayar->ayar_smtppassword}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Smtp Port<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" placeholder="Smtp portunu giriniz..." name="ayar_smtpport" value="{{$ayar->ayar_smtpport}}" class="form-control col-md-7 col-xs-12">
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
