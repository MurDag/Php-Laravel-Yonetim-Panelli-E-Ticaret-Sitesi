@extends('backend.layout')
@section('content')
    <div class="right_col" role="main" style="min-height: 1846px;">
        <div class="row">
            <div class="col-md-12 col-sm-4 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Menü Düzenleme</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form action="{{route('menuler.update',$menu->id)}}" method="POST" id="demo-form2" data-parsley-validate
                              class="form-horizontal form-label-left">
                            @CSRF
                            @method('PUT')
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sayfa Linki
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="" id="first-name" disabled=""
                                           value="{{$menu->menu_url}}/sayfa-{{$menu->menu_seo_ad}}"
                                           required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                    Menü Ad
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="menu_ad"
                                           value="@if(old('menu_ad')!==null) {{old('menu_ad')}} @else {{$menu->menu_ad}} @endif"  required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Detay
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea class="ckeditor" id="editor1"
                                              name="menu_detay">@if(old('menu_detay')!==null) {{old('menu_detay')}} @else {{$menu->menu_detay}} @endif</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Url <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="menu_url"
                                           value="@if(old('menu_url')!==null) {{old('menu_url')}} @else {{$menu->menu_url}} @endif" required
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Sıra
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" name="menu_sira" 1
                                           value="@if(old('menu_sira')!==null){{old('menu_sira')}}@else{{$menu->menu_sira}}@endif" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü
                                    Durum<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="heard" class="form-control" name="menu_durum" required>
                                        @if(old('menu_durum')!==null)
                                            <option
                                                value="1" @php echo old('menu_durum') == '1' ? 'selected=""' : ''; @endphp>
                                                Aktif
                                            </option>
                                            <option
                                                value="1" @php echo old('menu_durum') == '0' ? 'selected=""' : ''; @endphp>
                                                Pasif
                                            </option>
                                        @else
                                            <option
                                                value="1" @php echo $menu->menu_durum == '1' ? 'selected=""' : ''; @endphp>
                                                Aktif
                                            </option>
                                            <option
                                                value="1" @php echo $menu->menu_durum == '0' ? 'selected=""' : ''; @endphp>
                                                Pasif
                                            </option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="menu_id" value="{{$menu->id}}">
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="menuduzenle" class="btn btn-success">Güncelle</button>
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
