@extends('backend.layout')
@section('content')
    <div class="right_col" role="main" style="min-height: 1846px;">
        <div class="row">
            <div class="col-md-12 col-sm-4 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Sipariş Listeleme</h2>
                        <div class="clearfix"></div>
                        <div align="right">
                            <a href="{{route('siparis.create')}}">
                                <button class="btn btn-success btn-xs"> Yeni Ekle</button>
                            </a>
                        </div>
                    </div>
                    <div class="x_content">
                        <table class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>İd</th>
                                <th>Kullanıcı Ad</th>
                                <th>Sipariş Toplam</th>
                                <th>Sipariş Tip</th>
                                <th>Sipariş Banka</th>
                                <th><center>Ödeme Durum</center></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="sortable">
                            @foreach($siparis as $siparis)
                                <tr style="vertical-align: middle;" id="item-{{$siparis->id}}">
                                    <td style="vertical-align: middle;" width="20">{{$siparis->id}}</td>
                                    <td style="vertical-align: middle;">
                                        @php
                                        $kullanici=\App\Models\Kullanicis::where('id',$siparis->kullanici_id)->first();
                                        echo  '<a style="text-decoration: underline;" href="#">'.$kullanici->kullanici_ad.' '.$kullanici->kullanici_soyad.'</a>';
                                        @endphp
                                    </td>
                                    <td style="vertical-align: middle;">{{$siparis->siparis_toplam}}</td>
                                    <td style="vertical-align: middle;">{{$siparis->siparis_tip}}</td>
                                    <td style="vertical-align: middle;">{{$siparis->siparis_banka}}</td>
                                    <td style="vertical-align: middle;">
                                        <center>
                                            @if($siparis->siparis_odeme==1)
                                                <button  class="btn btn-success btn-xs context-menu">Ödendi</button>
                                            @elseif($siparis->siparis_odeme==0)
                                                <button disabled class="btn btn-warning btn-xs context-menu">Ödenmedi</button>
                                            @endif
                                        </center>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <center>
                                            <button id="{{$siparis->id}}"
                                                    class="btn btn-info btn-xs" style="background: #2C4257;">Sipariş Detay
                                            </button>
                                        </center>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <center>
                                            <button id="{{$siparis->id}}"
                                                    class="btn btn-primary btn-xs">Düzenle
                                            </button>
                                        </center>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <center>
                                            <button id="{{$siparis->id}}"
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
    <script type="text/javascript">
        $('.context-menu').css('cursor','context-menu');
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#sortable').sortable({
                revert: true,
                handle: ".sortable",
                stop: function (event, ui) {
                    var data = $(this).sortable('serialize');
                    $.ajax({
                        type: "POST",
                        data: data,
                        url: "{{route('slider.sortable')}}",
                        success: function (msg) {
                            // console.log(msg);
                            if (msg) {
                                alertify.success("İşlem Başarılı");
                            } else {
                                alertify.error("İşlem Başarısız");
                            }
                        }
                    });

                }
            });
            $('#sortable').disableSelection();

        });
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
                    url: "slider/durum/change/" + update_id + '/pasif',
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
                    url: "slider/durum/change/" + update_id + '/aktif',
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
                        url: "slider/delete/" + destroy_id,
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
