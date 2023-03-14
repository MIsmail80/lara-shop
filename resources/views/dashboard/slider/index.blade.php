@extends('dashboard.layout')

@section('title')
    Slider
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Slider</h1>

        <a href="{{ url('/admin/slides/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            New Slide
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Slider List
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Content</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @if ($slides->isNotEmpty())
                            @foreach ($slides as $slide)
                                <tr>
                                    <td>
                                        {!! $slide->content !!}
                                    </td>
                                    <td>
                                        <img src="{{ asset($slide->photo) }}" style="width: 200px;" />
                                    </td>
                                    <td>
                                        <i
                                            class="fas fa-{{ $slide->active ? 'check text-success' : 'times text-danger' }}"></i>
                                    </td>
                                    <td>
                                        <form action="{{ url('/admin/slides/' . $slide->id) }}" method="POST">
                                            <a href="{{ url("admin/slides/$slide->id/edit") }}"
                                                class="btn btn-sm btn-warning">
                                                Edit
                                            </a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>

                                            <a href="{{ url('/admin/toggle-slide-active/' . $slide->id) }}" class="btn btn-{{ $slide->active ? 'dark' : 'success' }}">
                                                {{ $slide->active ? 'Disable' : 'Enable' }}
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">
                                    <div class="alert alert-danger" role="alert">
                                        No Data Found!
                                    </div>
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>

                {{ $slides->links() }}
            </div>
        </div>
    </div>

@endsection
