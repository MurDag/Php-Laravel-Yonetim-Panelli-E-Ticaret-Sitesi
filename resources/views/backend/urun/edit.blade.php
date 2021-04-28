@extends('backend.layout')
@section('content')
    <div class="right_col" role="main" style="min-height: 1846px;">
        <div class="row">
            <div class="col-md-12 col-sm-4 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Ürün Düzenle</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                            @if($data['urun']->urun_video !== null)
                            <label>Yüklü Video
                            </label><br>
                            <video style="position: absolute;" width="400" height="250" controls="controls">
                                <source src="/videos/backend/urun/{{$data['urun']->urun_video}}"/>
                            </video>
                            @endif
                        <form action="{{route('urun.update',$data['urun']->id)}}" method="POST" id="demo-form2"
                              data-parsley-validate=""
                              class="form-horizontal form-label-left" enctype="multipart/form-data">
                            @CSRF
                            <div class="form-group">
                                <label class="control-label @if($data['urun']->urun_video!==null) col-md-4 @else col-md-3 @endif col-sm-3 col-xs-12" for="first-name">Kategori
                                    Seç<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <select class="select2_multiple form-control" required="" name="kategori_id">
                                        @foreach($data['kategori'] as $kategori)
                                            <option value="{{$kategori->id}}"
                                                    @if(old('kategori_id')==$kategori->id) selected @endif>{{$kategori->kategori_ad}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label @if($data['urun']->urun_video!==null) col-md-4 @else col-md-3 @endif col-sm-3 col-xs-12" for="first-name">Ürün Ad <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" @if(old('urun_ad')!==null))
                                           value="{{old('urun_ad')}}" @else  value="{{$data['urun']->urun_ad}}"
                                           @endif name="urun_ad" placeholder="Ürün adını giriniz"
                                           required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label @if($data['urun']->urun_video!==null) col-md-4 @else col-md-3 @endif col-sm-3 col-xs-12" for="first-name">İçerik
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea class="form-control" id="editor1"
                                                          name="urun_detay">@if(old('urun_detay')!==null)
                                                        ) {{old('urun_detay')}} @else {{$data['urun']->urun_detay}}  @endif</textarea>
                                    <script>
                                        CKEDITOR.replace('urun_detay');
                                    </script>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label @if($data['urun']->urun_video!==null) col-md-4 @else col-md-3 @endif col-sm-3 col-xs-12" for="first-name">Ürün Fiyat
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" @if(old('urun_fiyat')!==null))
                                           value="{{old('urun_fiyat')}}" @else  value="{{$data['urun']->urun_fiyat}}"
                                           @endif name="urun_fiyat"
                                           placeholder="Ürün fiyat giriniz" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label @if($data['urun']->urun_video!==null) col-md-4 @else col-md-3 @endif col-sm-3 col-xs-12" for="first-name">Ürün Video
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" id="first-name" value="{{old('urun_video')}}" name="urun_video"
                                           placeholder="Ürün video giriniz" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label @if($data['urun']->urun_video!==null) col-md-4 @else col-md-3 @endif col-sm-3 col-xs-12" for="first-name">Ürün Keyword
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" @if(old('urun_keyword')!==null))
                                           value="{{old('urun_keyword')}}"
                                           @else  value="{{$data['urun']->urun_keyword}}" @endif  name="urun_keyword"
                                           placeholder="Ürün keyword giriniz" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label @if($data['urun']->urun_video!==null) col-md-4 @else col-md-3 @endif col-sm-3 col-xs-12" for="first-name">Ürün Stok
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" @if(old('urun_stok')!==null))
                                           value="{{old('urun_stok')}}" @else  value="{{$data['urun']->urun_stok}}"
                                           @endif name="urun_stok" placeholder="Ürün stok giriniz"
                                           required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label @if($data['urun']->urun_video!==null) col-md-4 @else col-md-3 @endif col-sm-3 col-xs-12" for="first-name">Ürün
                                    Öne Çıkar<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="heard" class="form-control" name="urun_onecikar" required="">
                                        @if(old('urun_onecikar')!==null)
                                            <option value="1" @if(old('urun_onecikar')==1) selected @endif>Evet</option>
                                            <option value="0" @if(old('urun_onecikar')==0) selected @endif>Hayır
                                            </option>
                                        @else
                                            <option value="1" @if($data['urun']->urun_onecikar==1) selected @endif>
                                                Evet
                                            </option>
                                            <option value="0" @if($data['urun']->urun_onecikar==0) selected @endif>
                                                Hayır
                                            </option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label @if($data['urun']->urun_video!==null) col-md-4 @else col-md-3 @endif col-sm-3 col-xs-12" for="first-name">Ürün
                                    Durum<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="heard" class="form-control" name="urun_durum" required="">
                                        @if(old('urun_durum')!==null)
                                            <option value="1" @if(old('urun_durum')==1) selected @endif>Aktif</option>
                                            <option value="0" @if(old('urun_durum')==0) selected @endif>Pasif</option>
                                        @else
                                            <option value="1" @if($data['urun']->urun_durum==1) selected @endif>Aktif
                                            </option>
                                            <option value="0" @if($data['urun']->urun_durum==0) selected @endif>Pasif
                                            </option>
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
                            <input type="hidden" name="urun_eskivideo" value="{{$data['urun']->urun_video}}">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('css')  @endsection
@section('js')   @endsection
