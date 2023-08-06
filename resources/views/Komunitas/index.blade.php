@extends('layouts.user_type.auth')

@section('content')
<div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Menu Komunitas</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('komunitas.create') }}" class="btn btn-md btn-success mb-3">+ Saran atau Kritik</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">JUDUL</th>
                                <th scope="col">SARAN / KRITIK</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{!! $post->content !!}</td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>
                          {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
