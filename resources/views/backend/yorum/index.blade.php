@extends('backend.layout')
@section('content')
    <style>
        .textareaa {
            width: 100%;
            border: 0 none white;
            overflow: hidden;
            padding: 10px;
            outline: none;
            background-color: #f7e1b5;
            border-radius: 5px;
        }

    </style>
    <div class="right_col" role="main" style="min-height: 1846px;">
        <div class="row">
            <div class="col-md-12 col-sm-4 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Yorumlar</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>İd</th>
                                <th>Yorum</th>
                                <th>Kullanıcı</th>
                                <th>Ürün</th>
                                <th>Durum</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach($yorum as $yorum)
                                <tr id="item-{{$yorum->id}}">
                                    <td width="20">{{$yorum->id}}</td>
                                    <td><textarea disabled  style="height:1em;" id="text-{{$i}}" class="textareaa">{{$yorum->yorum_detay}}</textarea>
                                    </td>
                                    <td>
                                        @php
                                            $kullanici= \App\Models\Kullanicis::where('id',$yorum->kullanici_id)->first();
                                            echo $kullanici->kullanici_ad.' '.$kullanici->kullanici_soyad;
                                        @endphp
                                    </td>
                                    <td>
                                        @php
                                            $urun= \App\Models\Uruns::where('id',$yorum->urun_id)->first();
                                            echo $urun->urun_ad;
                                        @endphp
                                    </td>
                                    <td>
                                        <center>
                                            @if ($yorum->yorum_durum == 1)

                                                <button id="{{$yorum->id}}" btndurum="{{$yorum->id}}" name="onayla" class="btn btn-success btn-xs">Onayla</button>
                                            @elseif($yorum->yorum_durum == 0)
                                                <button id="{{$yorum->id}}" btndurum="{{$yorum->id}}" name="kaldir" class="btn btn-warning btn-xs">Kaldır</button>
                                            @endif
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <button id="{{$yorum->id}}"  class="btn btn-danger btn-xs sil">Sil</button>
                                        </center>
                                    </td>
                                </tr>
                                @php
                                $i++;
                                @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        $('td').css('text-align','center');
        $('td').css('vertical-align','middle');

        var lengthItem = {{$i}};

        var observe;
        if (window.attachEvent) {
            observe = function (element, event, handler) {
                element.attachEvent('on'+event, handler);
            };
        }
        else {
            observe = function (element, event, handler) {
                element.addEventListener(event, handler, false);
            };
        }
        function init () {

            for (var i=1;i<=lengthItem;i++)
            {
            var text = document.getElementById('text-'+i);
            function resize () {
                text.style.height = 'auto';
                text.style.height = text.scrollHeight+'px';
            }
            /* 0-timeout to get the already changed text */
            function delayedResize () {
                window.setTimeout(resize, 0);
            }
            observe(text, 'change',  resize);
            observe(text, 'cut',     delayedResize);
            observe(text, 'paste',   delayedResize);
            observe(text, 'drop',    delayedResize);
            observe(text, 'keydown', delayedResize);

            text.focus();
            text.select();
            resize();
            }
        }

        $("button[name='onayla'] , button[name='kaldir']").click(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            destroy_id = $(this).attr('id');

            if ($(this).attr('name') == 'kaldir') {
                $.ajax({
                    type: "GET",
                    url: "yorum/durum/" + destroy_id + '/kaldir',
                    success: function (msg) {
                        if (msg) {
                            $("button[btndurum=" + destroy_id + "]").removeClass('btn-warning');
                            $("button[btndurum=" + destroy_id + "]").addClass('btn-success');
                            $("button[btndurum=" + destroy_id + "]").text('Onayla');
                            $("button[btndurum=" + destroy_id + "]").attr('name', 'onayla');
                            alertify.success("İşlem Başarılı");
                        } else {
                            alertify.error("İşlem Başarısız");
                        }
                    }
                });
            }

            if ($(this).attr('name') == 'onayla') {
                $.ajax({
                    type: "GET",
                    url: "yorum/durum/" + destroy_id + '/onayla',
                    success: function (msg) {

                        if (msg) {
                            $("button[btndurum=" + destroy_id + "]").removeClass('btn-success');
                            $("button[btndurum=" + destroy_id + "]").addClass('btn-warning');
                            $("button[btndurum=" + destroy_id + "]").text('Kaldır');
                            $("button[btndurum=" + destroy_id + "]").attr('name', 'kaldir');
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
                        url: "yorum/sil/" + destroy_id,
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
