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
                        <form action="{{route('menuler.store')}}" method="POST" id="demo-form2"
                              data-parsley-validate
                              class="form-horizontal form-label-left">
                            @CSRF
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                    Menü Ad
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="menu_ad" required="required" placeholder="Menü Ad" value="{{old('menu_ad')}}"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Detay
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea class="ckeditor" id="editor1"
                                              name="menu_detay">{{old('menu_detay')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Url <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="menu_url" placeholder="Menü Url" value="{{old('menu_url')}}" required
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Sıra
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" name="menu_sira" placeholder="Menü Sıra" value="{{old('menu_sıra')}}"
                                           required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü
                                    Durum<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="heard" class="form-control" name="menu_durum" required>
                                        <option
                                            value="1" @php echo old('menu_durum') == '1' ? 'selected=""' : ''; @endphp>
                                            Aktif
                                        </option>
                                        <option
                                            value="1" @php echo old('menu_durum') == '0' ? 'selected=""' : ''; @endphp>
                                            Pasif
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="menu_id"
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="menuduzenle" class="btn btn-success">Ekle</button>
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
