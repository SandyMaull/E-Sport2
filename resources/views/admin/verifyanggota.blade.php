@extends('admin.layouts.app')

@section('title')
    ESport - Admin Verify Anggota
@endsection

@section('content')
<div class="card mt-4 mx-4">
    <div class="card-header">
        <div class="card-title">List data anggota yang belum terverifikasi</div>
    </div>
    <div class="card-body">
        <div class="table-responsive mt-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>No. Whatsapp<br>(Format Harus: 6282260879023)</th>
                        <th>Pekerjaan</th>
                        <th>Foto Identitas<br>(KTP/KK/SIM/Kartu Pelajar)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($data as $dat)
                        <tr>
                            <td>{{ $dat['comment'] }}</td>
                            @if ($dat['disabled'] == 'true')
                                <td class="bg-success text-center"><span class="text-white">Akses Granted</span></td>
                                <td>
                                    <button type="button" data-action="Memblokir" data-nama="{{ $dat['comment'] }}" data-ip="{{$dat['address']}}" class="btn btn-xs btn-secondary alert_confirm">Blokir</button>
                                </td>
                            @else
                                <td class="bg-danger text-center"><span class="text-white">Akses Denied</span></td>
                                <td>
                                    <button type="button" data-action="Membuka Blokir" data-nama="{{ $dat['comment'] }}" data-ip="{{$dat['address']}}" class="btn btn-xs btn-secondary alert_confirm">Izinkan</button>
                                </td>
                            @endif
                        </tr>
                    @endforeach --}}
                    @foreach ($anggota as $ang)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$ang->name}}</td>
                            <td>{{$ang->nmor_wa}}</td>
                            <td>{{$ang->pekerjaan}}</td>
                            <td><a target="_blank" href="{{ url($ang->foto_identitas) }}">Preview</a></td>
                            <td>
                                <button data-nama="{{ $ang->name }}" data-action="Menerima" data-id_ang="{{ $ang->id }}" class="btn btn-primary btn-xs alert_confirm">Accept Request</button>
                                <button data-nama="{{ $ang->name }}" data-action="Menghapus" data-id_ang="{{ $ang->id }}" class="btn btn-danger btn-xs alert_confirm">Delete Request</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<form id="form_submit" action="{{ route('verifypost') }}" method="post">
    @csrf
    <input type="hidden" id="id_anggota" name="id_ang">
    <input type="hidden" id="action_post" name="action_ang">
</form>
@endsection

@section('script')
	<script>
		const navbar1 = document.getElementById('nav_verifyanggota');
        navbar1.classList.add("active");


        $('.alert_confirm').click(function(e) {
            const id = $(this).data('id_ang');
            const nama = $(this).data('nama');
            const action = $(this).data('action');
            swal({
                title: 'Apakah Anda Yakin?',
                text: "Apakah anda ingin " + action + " Permintaan dari " + nama,
                icon: 'warning',
                dangerMode: true,
                buttons:{
                    cancel: {
                        visible: true,
                        text: 'Batal',
                        className: 'btn btn-secondary'
                    },
                    confirm: {
                        text: 'Lanjutkan',
                        className: 'btn btn-primary'
                    }
                }
            }).then((dataConfirm) => {
                if (dataConfirm) {
                    document.getElementById('id_anggota').value = id;
                    document.getElementById('action_post').value = action;
                    document.getElementById('form_submit').submit();
                } else {
                    swal("Aksi Dibatalkan!", {
                        icon: 'success',
                        buttons : {
                            confirm : {
                                className: 'btn btn-success'
                            }
                        }
                    });
                }
            });
        });
	</script>
@endsection
