@extends('backend.layout')
@section('content')
    <div class="right_col" role="main" style="min-height: 1846px;">
        <div class="row">
            <div class="col-md-12 col-sm-4 col-xs-12">

                <div class="x_panel">
                    <form action="{{route('urunfoto.delete_img')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="x_title">
                        <div align="left" class="col-md-6">
                            <h2>Resim Ürün Fotoğraf İşlemleri</h2><br>
                        </div>

                            <input type="hidden" name="urun_id" value="{{session('urun_id')}}">

                            <div align="right" class="col-md-6">
                                <button type="submit" class="btn btn-danger "><i class="fa fa-trash"
                                                                                 aria-hidden="true"></i> Seçilenleri Sil
                                </button>
                                <a class="btn btn-success" href="{{route('urun.img.add',session('urun_id'))}}"><i
                                        class="fa fa-plus" aria-hidden="true"></i> Ürün Fotoğraf Yükle</a>
                            </div>
                            <div class="clearfix"></div>

                    </div>

                    <div class="x_content">
                        @foreach($urunfoto as $urunfoto)
                            <div class="col-md-55">
                                <label>

                                    <div class="image view view-first">
                                        <img style="width: 250px; height: 100px; display: block;"
                                             src="{{ asset('') }}/images/backend/products/{{$urunfoto->urunfoto_resim}}" alt="image">
                                        <div class="mask">
                                            <p><br>
                                                {{$urunfoto->urunfoto_resim}}  </p>
                                        </div>
                                    </div>
                                    <br>
                                    <p>
                                        {{$urunfoto->urunfoto_resim}}  </p>
                                    <input type="checkbox" name="urunfotosec[]" value="{{$urunfoto->urunfoto_resim}}"> Seç
                                </label>
                            </div>
                        @endforeach
                        <div align="right" class="col-md-12">
                            <ul class="pagination">
                                <li class="active">

                                    <a href="urunfoto.php?sayfa=1">1</a>

                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('css')  @endsection
@section('js')   @endsection
