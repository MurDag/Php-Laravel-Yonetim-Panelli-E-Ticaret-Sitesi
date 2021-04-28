@extends('backend.layout')
@section('content')
    <div class="right_col" role="main" style="min-height: 1846px;">
        <div class="row">
            <div class="col-md-12 col-sm-4 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Ürünler</h2>
                        <div class="clearfix"></div>
                        <div align="right">
                            <a href="{{route('urun.create')}}">
                                <button style="width: 165px; height: 30px;" class="btn btn-success btn-xs"> Yeni Ekle
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="x_content">

                        <div id="datatable-responsive_wrapper"
                             class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-responsive"
                                           class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                           cellspacing="0" width="100%" role="grid"
                                           aria-describedby="datatable-responsive_info" style="width: 100%;">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" aria-controls="datatable-responsive"
                                                rowspan="1" colspan="1" style="width: 42px;" aria-sort="ascending"
                                                aria-label="S.No: activate to sort column descending">Id
                                            </th>
                                            <th class="sorting" aria-controls="datatable-responsive"
                                                rowspan="1" colspan="1" style="width: 14px;"
                                                aria-label=": activate to sort column ascending">ürün Ad</th>
                                            <th class="sorting" aria-controls="datatable-responsive"
                                                rowspan="1" colspan="1" style="width: 14px;"
                                                aria-label=": activate to sort column ascending">Ürün Stok</th>
                                            <th class="sorting" aria-controls="datatable-responsive"
                                                rowspan="1" colspan="1" style="width: 14px;"
                                                aria-label=": activate to sort column ascending">Ürün Fiyat</th>
                                            <th class="sorting" aria-controls="datatable-responsive"
                                                rowspan="1" colspan="1" style="width: 14px;"
                                                aria-label=": activate to sort column ascending">Resim</th>
                                            <th class="sorting" aria-controls="datatable-responsive"
                                                rowspan="1" colspan="1" style="width: 14px;"
                                                aria-label=": activate to sort column ascending">Öne Çıkar</th>
                                            <th class="sorting" aria-controls="datatable-responsive"
                                                rowspan="1" colspan="1" style="width: 14px;"
                                                aria-label=": activate to sort column ascending">Durum</th>
                                            <th class="sorting" aria-controls="datatable-responsive"
                                                rowspan="1" colspan="1" style="width: 46px;"
                                                aria-label=": activate to sort column ascending"></th>
                                            <th class="sorting" aria-controls="datatable-responsive"
                                                rowspan="1" colspan="1" style="width: 14px;"
                                                aria-label=": activate to sort column ascending"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($urun as $urun)
                                            <tr role="row" class="even" id="item-{{$urun->id}}">
                                                <td width="20" class="sorting_1">{{$urun->id}}</td>
                                                <td>{{$urun->urun_ad}}</td>
                                                <td>{{$urun->urun_stok}}</td>
                                                <td>{{$urun->urun_fiyat}}</td>
                                                <td>
                                                    <center><a href="{{route('urun.img.create',$urun->id)}}">
                                                            <button class="btn btn-success btn-xs">Resim İşlemleri
                                                            </button>
                                                        </a></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        @if($urun->urun_onecikar==0)
                                                            <button btnonecikar="{{$urun->id}}" id="{{$urun->id}}"
                                                                    name="onecikar"
                                                                    class="btn btn-success btn-xs">Öne Çıkar
                                                            </button>
                                                        @else
                                                            <button btnonecikar="{{$urun->id}}" id="{{$urun->id}}"
                                                                    name="kaldir"
                                                                    class="btn btn-warning btn-xs">Kaldır
                                                            </button>
                                                        @endif
                                                    </center>
                                                </td>
                                                <td>
                                                    <center>
                                                        @if($urun->urun_durum==1)
                                                            <button btndurum="{{$urun->id}}" id="{{$urun->id}}"
                                                                    name="pasif" class="btn btn-success btn-xs">
                                                                Aktif
                                                            </button>
                                                        @elseif($urun->urun_durum==0)
                                                            <button btndurum="{{$urun->id}}" id="{{$urun->id}}"
                                                                    name="aktif" class="btn btn-danger btn-xs">
                                                                Pasif
                                                            </button>
                                                        @endif
                                                    </center>
                                                </td>
                                                <td>
                                                    <center><a href="{{route('urun.edit',$urun->id)}}">
                                                            <button class="btn btn-primary btn-xs">Düzenle</button>
                                                        </a></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <button btnsil="{{$urun->id}}" id="{{$urun->id}}"
                                                                class="btn btn-danger btn-xs sil">Sil
                                                        </button>
                                                    </center>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $("button[name='onecikar'] , button[name='kaldir']").click(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            destroy_id = $(this).attr('id');

            if ($(this).attr('name') == 'onecikar') {
                $.ajax({
                    type: "GET",
                    url: "urun/onecikar/" + destroy_id + '/onecikar',
                    success: function (msg) {
                        if (msg) {
                            $("button[btnonecikar=" + destroy_id + "]").removeClass('btn-success');
                            $("button[btnonecikar=" + destroy_id + "]").addClass('btn-warning');
                            $("button[btnonecikar=" + destroy_id + "]").text('Kaldır');
                            $("button[btnonecikar=" + destroy_id + "]").attr('name', 'kaldir');
                            alertify.success("İşlem Başarılı");
                        } else {
                            alertify.error("İşlem Başarısız");
                        }
                    }
                });
            }

            if ($(this).attr('name') == 'kaldir') {
                $.ajax({
                    type: "GET",
                    url: "urun/onecikar/" + destroy_id + '/kaldır',
                    success: function (msg) {

                        if (msg) {
                            $("button[btnonecikar=" + destroy_id + "]").removeClass('btn-warning');
                            $("button[btnonecikar=" + destroy_id + "]").addClass('btn-success');
                            $("button[btnonecikar=" + destroy_id + "]").text('Öne Çıkar');
                            $("button[btnonecikar=" + destroy_id + "]").attr('name', 'onecikar')
                            alertify.success("İşlem Başarılı");
                        } else {
                            alertify.error("İşlem Başarısız");
                        }
                    }
                });
            }
        });
        $("button[name='aktif'] , button[name='pasif']").click(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            destroy_id = $(this).attr('id');

            if ($(this).attr('name') == 'pasif') {
                $.ajax({
                    type: "GET",
                    url: "urun/durum/" + destroy_id + '/pasif',
                    success: function (msg) {
                        if (msg) {
                            $("button[btndurum=" + destroy_id + "]").removeClass('btn-success');
                            $("button[btndurum=" + destroy_id + "]").addClass('btn-danger');
                            $("button[btndurum=" + destroy_id + "]").text('Pasif');
                            $("button[btndurum=" + destroy_id + "]").attr('name', 'aktif');
                            alertify.success("İşlem Başarılı");
                        } else {
                            alertify.error("İşlem Başarısız");
                        }
                    }
                });
            }

            if ($(this).attr('name') == 'aktif') {
                $.ajax({
                    type: "GET",
                    url: "urun/durum/" + destroy_id + '/aktif',
                    success: function (msg) {

                        if (msg) {
                            $("button[btndurum=" + destroy_id + "]").removeClass('btn-danger');
                            $("button[btndurum=" + destroy_id + "]").addClass('btn-success');
                            $("button[btndurum=" + destroy_id + "]").text('Aktif');
                            $("button[btndurum=" + destroy_id + "]").attr('name', 'pasif');
                            alertify.success("İşlem Başarılı");
                        } else {
                            alertify.error("İşlem Başarısız");
                        }
                    }
                });
            }
        });
        $(".sil").click(function () {
            destroy_id = $(this).attr('id');


            alertify.confirm('Silme işlemini onaylayın !', 'Bu işlem geri alınamaz.',
                function () {
                    $.ajax({
                        type: "GET",
                        url: "urun/sil/" + destroy_id,
                        success: function (msg) {
                            if (msg) {
                                $("#item-" + destroy_id).remove();
                                alertify.success("Silme işlemi başarılı.");
                            } else {
                                alertify.error("Silme işlemi başarısız.");
                            }
                        }
                    });
                },
                function () {
                    alertify.error('Silme işlemi iptal edildi.');
                }
            )
        });
    </script>
@endsection
@section('css')  @endsection
@section('js')   @endsection
