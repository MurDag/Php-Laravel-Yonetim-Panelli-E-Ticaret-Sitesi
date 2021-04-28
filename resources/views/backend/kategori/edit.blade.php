@extends('backend.layout')
@section('content')
    <div class="right_col" role="main" style="min-height: 1846px;">
        <div class="row">
            <div class="col-md-12 col-sm-4 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Kategori Düzenleme</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form action="{{route('kategori.update',$kategori->id)}}" method="POST" id="demo-form2"
                              data-parsley-validate
                              class="form-horizontal form-label-left">
                            @CSRF
                            @method('PUT')
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Ad
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="kategori_ad"
                                           placeholder="Kategori adını giriniz" required="required"
                                           @if(old('kategori_ad')!==null)
                                           value="{{old('kategori_ad')}}"
                                           @else
                                           value="{{$kategori->kategori_ad}}"
                                           @endif
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Sıra
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" name="kategori_sira" placeholder="Sıra giriniz"
                                           @if(old('kategori_sira')!==null)
                                           value="{{old('kategori_sira')}}"
                                           @else
                                           value="{{$kategori->kategori_sira}}"
                                           @endif
                                           required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Durum<span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="heard" class="form-control" name="kategori_durum" required>
                                        @if(old('kategori_durum')!==null)
                                            <option @if(old('kategori_durum')==1) selected @endif value="1">Aktif
                                            </option>
                                            <option @if(old('kategori_durum')==0) selected @endif value="0">Pasif
                                            </option>
                                        @else
                                            <option @if($kategori->kategori_durum==1) selected @endif value="1">Aktif
                                            </option>
                                            <option @if($kategori->kategori_durum==0) selected @endif value="0">Pasif
                                            </option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="kategoriekle" class="btn btn-success">Güncelle</button>
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
