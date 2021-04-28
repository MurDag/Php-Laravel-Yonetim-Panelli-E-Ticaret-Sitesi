@extends('backend.layout')
@section('content')
    <div class="right_col" role="main" style="min-height: 1846px;">
        <div class="row">
            <div class="col-md-12 col-sm-4 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Çoklu resim yükleme işlemleri</h2>

                                        <div align="right" class="col-md-9">

                                            <a class="btn btn-success" href="{{route('urun.img.create',session('urun_id'))}}"><i
                                                    class="fa fa-plus" aria-hidden="true"></i> Yüklenen Resimleri Gör
                                            </a>
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <p>Yüklenecek resimlerin bulunduğu klasöre giderek tamamını tek seferde seçerek
                                            yükleyebilirsiniz.</p>


                                        <form action="{{route('urunfoto.add_img')}}" class="dropzone"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="urun_id" value="14">

                                            <div class="dz-default dz-message"><span>Drop files here to upload</span>

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
    </div>

@endsection
@section('css')  @endsection
@section('js')   @endsection
