@extends('backend.layout')
@section('content')
    <div class="right_col" role="main" style="min-height: 1846px;">
        <div class="row">
            <div class="col-md-12 col-sm-4 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Kullanıcılar</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div align="right">
                        <a href="/nedmin/kullanici-ekle">
                            <button style="width: 165px; height: 30px;" class="btn btn-success btn-xs"> Yeni Ekle
                            </button>
                        </a>
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
                                            <th class="sorting_desc" tabindex="0" aria-controls="datatable-responsive"
                                                rowspan="1" colspan="1" style="width: 170px;"
                                                aria-label="Kayıt Tarih: activate to sort column ascending"
                                                aria-sort="descending">Kayıt Tarih
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                rowspan="1" colspan="1" style="width: 108px;"
                                                aria-label="Ad Soyad: activate to sort column ascending">Ad Soyad
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                rowspan="1" colspan="1" style="width: 212px;"
                                                aria-label="Mail Adresi: activate to sort column ascending">Mail Adresi
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                rowspan="1" colspan="1" style="width: 107px;"
                                                aria-label="Telefon: activate to sort column ascending">Telefon
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                rowspan="1" colspan="1" style="width: 107px;"
                                                aria-label="Telefon: activate to sort column ascending">Resim
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                rowspan="1" colspan="1" style="width: 61px;"
                                                aria-label=": activate to sort column ascending"></th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                rowspan="1" colspan="1" style="width: 22px;"
                                                aria-label=": activate to sort column ascending"></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($kullanici as $user)
                                            <tr id="item-{{$user->id}}" role="row" class="odd">
                                                <td style="vertical-align: middle;"  tabindex="0" class="sorting_1">{{$user->created_at}}</td>
                                                <td style="vertical-align: middle;">{{$user->kullanici_ad." ".$user->kullanici_soyad}}</td>
                                                <td style="vertical-align: middle;">{{$user->kullanici_mail}}</td>
                                                <td style="vertical-align: middle;">{{$user->kullanici_gsm}}</td>
                                                @if($user->kullanici_resim!=null)
                                                    <td style="vertical-align: middle; text-align: center;">
                                                        <img width="100"
                                                                     src="{{ asset('') }}/images/backend/users/{{$user->kullanici_resim}}">

                                                    </td>
                                                @else
                                                    <td style="vertical-align: middle; text-align: center;">Resim Yok</td>

                                                @endif
                                                <td  style="vertical-align: middle; text-align: center;">
                                                    <center><a href="{{route('kullanici.edit',$user->id)}}">
                                                            <button class="btn btn-primary btn-xs">Düzenle</button>
                                                        </a></center>
                                                </td>
                                                <td  style="vertical-align: middle; text-align: center;">
                                                    <center>
                                                            <button id="{{$user->id}}" class="btn btn-danger btn-xs">Sil</button>
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

        $('.btn-danger').click(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            destroy_id = $(this).attr('id');

            alertify.confirm('Silme işlemini onaylayın !', 'Bu işlem geri alınamaz.',
                function () {

                    $.ajax({
                        type: "GET",
                        url: "kullanici/destroy/" + destroy_id,
                        success: function (msg) {

                            if (msg) {
                                $("#item-" + destroy_id).remove();
                                alertify.success("Silme İşlem Başarılı");
                            } else {
                                alertify.error("İşlem Tamamlanamadı");
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
