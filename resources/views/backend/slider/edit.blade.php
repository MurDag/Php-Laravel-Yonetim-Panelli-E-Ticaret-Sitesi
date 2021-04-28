@extends('backend.layout')
@section('content')
    <div class="right_col" role="main" style="min-height: 1846px;">
        <div class="row">
            <div class="col-md-12 col-sm-4 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Slider Ekleme </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form action="{{route('slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data"
                              id="demo-form2"
                              data-parsley-validate class="form-horizontal form-label-left">
                            @CSRF
                            @method('PUT')
                            @if($slider->slider_resim != null )

                                <div class="form-group">
                                    <label style="margin-bottom: 10px;"> Yüklü Resim</label>
                                    <div style="width: 290px; position: absolute;box-shadow: 0px 0px 9px 5px #0D3349;">
                                        <img width="290" src="{{ asset('') }}/images/backend/sliders/{{$slider->slider_resim}}" alt="">
                                    </div>
                                </div>

                            @endif

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" id="first-name" name="slider_resim"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Ad
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="slider_ad" required="required"
                                           @if(old('slider_ad')!==null)
                                           value="{{old('slider_ad')}}"
                                           @else
                                           value="{{$slider->slider_ad}}"
                                           @endif
                                           placeholder="Slider adını giriniz" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Url
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="slider_link"
                                           @if(old('slider_link')!==null)
                                           value="{{old('slider_link')}}"
                                           @else
                                           value="{{$slider->slider_link}}"
                                           @endif
                                           placeholder="Slider Link giriniz" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Sıra
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" name="slider_sira" required="required"
                                           @if(old('slider_sira')!==null)
                                           value="{{old('slider_sira')}}"
                                           @else
                                           value="{{$slider->slider_sira}}"
                                           @endif
                                           placeholder="Slider sıra giriniz" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider
                                    Durum<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="heard" class="form-control" name="slider_durum" required>
                                        @if(old('slider_durum')!==null)
                                            <option @if(old('slider_durum')==1) selected @endif value="1">Aktif</option>
                                            <option @if(old('slider_durum')==0) selected @endif value="0">Pasif</option>
                                        @else
                                            <option @if($slider->slider_durum==1) selected @endif value="1">Aktif</option>
                                            <option @if($slider->slider_durum==0) selected @endif value="0">Pasif</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Güncelle</button>
                                </div>
                            </div>
                            <input type="hidden" name="eski_resim" value="{{$slider->slider_resim}}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('css')  @endsection
@section('js')   @endsection
