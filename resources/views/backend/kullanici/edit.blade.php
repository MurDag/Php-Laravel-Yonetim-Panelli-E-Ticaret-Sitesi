
@extends('backend.layout')
@section('content')
    <div class="right_col" role="main" style="min-height: 1846px;">
        <div class="row">
            <div class="col-md-12 col-sm-4 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Kullanıcı Düzenle</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>

                        <form action="{{route('kullanici.update',$kullanici->id)}}" method="POST" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @if($kullanici->kullanici_resim != null )

                            <div class="form-group">
                                <label style="margin-bottom: 10px"> Yüklü Resim</label>
                                <div style="width: 300px; position: absolute;box-shadow: 0px 0px 9px 5px #0D3349;">
                                    <img width="300" src="{{ asset('') }}/images/backend/users/{{$kullanici->kullanici_resim}}" alt="">
                                </div>
                            </div>

                            @endif

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" name="kullanici_ad" value="{{$kullanici->kullanici_ad}}" placeholder="Ad" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Soyad <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="lastname" name="kullanici_soyad" value="{{$kullanici->kullanici_soyad}}" placeholder="Soyad" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="kullanici_mail" placeholder="Mail" value="{{$kullanici->kullanici_mail}}"  required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Şifre <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" name="kullanici_password" value="{{$kullanici->kullanici_password}}" placeholder="Şifre" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">TC <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="kullanici_tc" value="{{$kullanici->kullanici_tc}}" placeholder="TC" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">GSM <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="tel" id="gsm" name="kullanici_gsm" value="{{$kullanici->kullanici_gsm}}" placeholder="GSM" required="required" class="form-control col-md-7 col-xs-12" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İl <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="kullanici_il" value="{{$kullanici->kullanici_il}}" placeholder="İl" required="required" class="form-control col-md-7 col-xs-12" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İlçe <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="kullanici_ilce" value="{{$kullanici->kullanici_ilce}}" placeholder="İlçe" required="required" class="form-control col-md-7 col-xs-12" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Adres <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="kullanici_adres" value="{{$kullanici->kullanici_adres}}" placeholder="Adres" required="required" class="form-control col-md-7 col-xs-12" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ünvan <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="kullanici_unvan" value="{{$kullanici->kullanici_unvan
}}" placeholder="Ünvan" required="required" class="form-control col-md-7 col-xs-12" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Yetki  <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="kullanici_yetki" class="form-control">
                                        <option value="1" selected>1</option>
                                        <option value="2" @if(old("kullanici_yetki")==2) selected @endif>2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Durum  <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="kullanici_durum" class="form-control">
                                        <option value="1" selected>Aktif</option>
                                        <option value="0" @if(old("kullanici_durum")==0) selected @endif>Pasif</option>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Resim Seç <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file"   name="kullanici_resim" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <input type="hidden" name="eski_resim" value="{{$kullanici->kullanici_resim}}">

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



@endsection
@section('css')  @endsection
@section('js')   @endsection
