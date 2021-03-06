@extends('layouts.master')
@section('title', 'Data Siswa')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Siswa</h1>
    </div>
    <a href="{{ route('siswa.create')}}" class="btn btn-icon icon-left btn-primary mb-4"><i class="fas fa-plus"></i>Tambah Siswa</a>
    
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-body table-responsive-sm">
            <table id="book-table" class="table table-bordered" width="100%" collspacing="0">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Kelas</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                <?php $no = 0;?>
                @forelse($students as $student)
                <tr>
                <td>{{ ++$no }} </td>
                <td>{{ $student->nis }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->FilterGender }}</td>
                <td>{{ $student->class }}</td>
                <td>
                  <a href="{{ route('siswa.edit', $student->id) }} " class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="right" title="Edit">
                    <i class="fa fa-pencil-alt" ></i>
                  </a>
                  <form action="{{ route('siswa.destroy', $student->id)}} " method="POST">
                  @csrf
                  @method('delete')
                  <button class="mt-2 btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Hapus">
                    <i class="fas fa-trash"></i>
                  </button>
                  </form>
                
                </td>
                </tr>
                @empty
                  <tr>
                      <td colspan="7" class="text-center">
                          Data Kosong
                      </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection