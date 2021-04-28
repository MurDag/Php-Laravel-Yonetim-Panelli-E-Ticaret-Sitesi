@extends('backend.layout')
@section('content')
    <div class="right_col" role="main" style="min-height: 1846px;">
        <div class="row">
            <div class="col-md-12 col-sm-4 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Banka Ekle</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form action="{{route('banka.store')}}" method="POST" id="demo-form2" data-parsley-validate
                              class="form-horizontal form-label-left">
                            @CSRF
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Id<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" name="kullanici_id"
                                           value="{{old('kullanici_id')}}"
                                           placeholder="Kullanıcı Id giriniz" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Banka Ad <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="banka_ad" value="{{old('banka_ad')}}"
                                           placeholder="Banka adını giriniz"
                                           required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Banka IBAN
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="banka_iban" value="{{old('banka_iban')}}"
                                           placeholder="Banka IBAN giriniz" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Banka
                                    Durum<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="heard" class="form-control" name="banka_durum" required>
                                        @if(old('kullanici_id')!==null)
                                            <option @if(old('kullanici_id')==1) selected @endif value="1">Aktif</option>
                                            <option @if(old('kullanici_id')==0) selected @endif value="0">Pasif</option>
                                        @else
                                            <option selected value="1">Aktif</option>
                                            <option value="0">Pasif</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Kaydet</button>
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
