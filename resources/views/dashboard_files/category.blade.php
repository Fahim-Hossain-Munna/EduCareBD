@extends('layouts.dashboardmaster')

@section('content')
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Category Update</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Category Information Add,</h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <div class="example-content">
                        <form class="row g-3" action="{{ route('category.insert') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label">Category Title</label>
                                <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" >
                                @error('category_name')
                                <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Category Image</label>
                                <input type="file" class="form-control @error('category_picture') is-invalid @enderror" name="category_picture">
                                @error('category_picture')
                                <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Category Description</label>
                                <textarea class="form-control @error('category_description') is-invalid @enderror" name="category_description" rows="4"></textarea>
                                @error('category_description')
                                <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Category Details Table,</h3>
                <hr>
                Total Category Available: <span class="badge bg-success">{{ $categories->count() }}</span>

            </div>
            <div class="card-body">
                <div class="example-container">
                    <div class="example-content">
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Picture</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                    <td>{{ $category->category_name }}</td>
                                    <td> <img src="{{ asset('backend/uploads/category_photo') }}/{{ $category->category_picture }}" style="width: 50px; height:50px;"> </td>
                                    <td class="d-flex">
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-style-light flex-grow-1 m-r-xxs m-4"><i class="material-icons">done</i>Edit</a>
                                    <form action="{{ route('category.delete.post', $category->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-style-light flex-grow-1 m-l-xxs m-4"><i class="material-icons">close</i>Ignore</button>
                                    </form>
                                    </td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('script_content')

@if (session('category_upload_msg'))
    <script>
        const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  Toast.fire({
    icon: 'success',
    title: '{{ session('category_upload_msg') }}'
  })
    </script>
@endif

<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>

@if (session('category_file__name_update'))
    <script>
        const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  Toast.fire({
    icon: 'success',
    title: '{{ session('category_file__name_update') }}'
  })
</script>
@endif
@if (session('category_file_image_update'))
    <script>
        const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  Toast.fire({
    icon: 'success',
    title: '{{ session('category_file_image_update') }}'
  })
</script>
@endif

{{-- <script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script> --}}

@if (session('category_file_not_uploaded'))
    <script>
        const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  Toast.fire({
    icon: 'error',
    title: '{{ session('category_file_not_uploaded') }}'
  })
    </script>
@endif
@if (session('category_file_delete'))
    <script>
        const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  Toast.fire({
    icon: 'error',
    title: '{{ session('category_file_delete') }}'
  })
    </script>
@endif

@if (session('category_file_description_update'))
    <script>
        const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  Toast.fire({
    icon: 'success',
    title: '{{ session('category_file_description_update') }}'
  })
    </script>
@endif



@endsection
