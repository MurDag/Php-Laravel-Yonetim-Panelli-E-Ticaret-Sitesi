@extends('backend.layout')
@section('content')
    <div class="right_col" role="main" style="min-height: 1846px;">
        <div class="row">
            <div class="col-md-12 col-sm-4 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Kategori Listeleme</h2>
                        <div class="clearfix"></div>
                        <div align="right">
                            <a href="{{route('kategori.create')}}">
                                <button class="btn btn-success btn-xs"> Yeni Ekle</button>
                            </a>
                        </div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Kategori Ad</th>
                                <th>Kategori Sira</th>
                                <th>Kategori Durum</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($kategori as $kategori)
                                <tr id="item-{{$kategori->id}}">
                                    <td width="20">{{$kategori->id}}</td>
                                    <td>{{$kategori->kategori_ad}}</td>
                                    <td>{{$kategori->kategori_sira}}</td>
                                    <td>
                                        <center>
                                            @if ($kategori->kategori_durum==1)
                                                <button btndurum="{{$kategori->id}}" id="{{$kategori->id}}" name="aktif"
                                                        class="btn btn-success btn-xs">Aktif
                                                </button>
                                            @else
                                                <button btndurum="{{$kategori->id}}" id="{{$kategori->id}}" name="pasif"
                                                        class="btn btn-danger btn-xs">Pasif
                                                </button>
                                            @endif
                                        </center>
                                    </td>
                                    <td>
                                        <center><a href="{{route('kategori.edit',$kategori->id)}}">
                                                <button class="btn btn-primary btn-xs">Düzenle</button>
                                            </a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <button id="{{$kategori->id}}" class="btn btn-danger btn-xs sil">Sil</button>
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
    <script type="text/javascript">
        $("button[name='aktif'] , button[name='pasif']").click(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            update_id = $(this).attr('id');

            if ($(this).attr('name') == 'pasif') {
                $.ajax({
                    type: "GET",
                    url: "kategori/durum/change/" + update_id + '/pasif',
                    success: function (msg) {
                        if (msg) {
                            $("button[btndurum=" + update_id + "]").removeClass('btn-danger');
                            $("button[btndurum=" + update_id + "]").addClass('btn-success');
                            $("button[btndurum=" + update_id + "]").text('Aktif');
                            $("button[btndurum=" + update_id + "]").attr('name', 'aktif');
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
                    url: "kategori/durum/change/" + update_id + '/aktif',
                    success: function (msg) {

                        if (msg) {
                            $("button[btndurum=" + update_id + "]").removeClass('btn-success');
                            $("button[btndurum=" + update_id + "]").addClass('btn-danger');
                            $("button[btndurum=" + update_id + "]").text('Pasif');
                            $("button[btndurum=" + update_id + "]").attr('name', 'pasif');
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
                        url: "kategori/delete/" + destroy_id,
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
