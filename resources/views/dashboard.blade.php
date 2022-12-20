    @extends('layouts.dashboardmaster')

    @section('content')

    <div class="row">
        <div class="col">
            <div class="page-description">
                    <h1>Welcome Chief("{{ auth()->user()->name }}") in Our Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <h2 class="text-danger fs-3 mb-4"> Our Service Section ,</h2>

        @foreach ($categories as $category)
        <div class="col-md-4">
            <div class="card widget widget-info">
                <div class="card-body">
                    <div class="widget-info-container">
                        <div class="widget-info-image" style="background: url('{{ asset('backend/uploads/category_photo') }}/{{ $category->category_picture }}')"></div>
                        <h5 class="widget-info-title">{{ $category->category_name }}</h5>
                        <a href="{{ route('php.view' , $category->id) }}" class="btn btn-primary widget-info-action">Overview</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $categories->links() }}
    <hr>

    <div class="row">
        <h2 class="text-danger fs-3 mb-4 mt-3">New Admin Addition Section ,</h2>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">New Admin Create</h5>
                </div>
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <form class="row g-3" action="{{ route('dashboard.admin.create') }}" method="POST">
                                @csrf
                                <div class="col-md-6">
                                    <label class="form-label">Admin Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" >
                                    @error('name')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Admin E-mail</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" >
                                    @error('email')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Admin Password</label>
                                    <input id="adminPasswordShow" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                    @error('password')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                    <br>
                                    <input type="checkbox" onclick="myFunction()"> Show Password
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Admin List</h5>
                </div>
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @forelse ($admins as $admin)
                                  <tr>
                                    <th scope="row"> {{ $admins->firstitem()+$loop->index }} </th>
                                    <td> {{ $admin->name }} </td>
                                    <td> {{ $admin->email }} </td>
                                    <td> {{ $admin->role }} </td>
                                  </tr>
                                  @empty

                                  @endforelse
                                </tbody>
                              </table>
                              {{ $admins->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Users List</h5>
                </div>
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @forelse ($users as $user)
                                  <tr>
                                    <th scope="row"> {{ $users->firstitem()+$loop->index }} </th>
                                    <td> {{ $user->name }} </td>
                                    <td> {{ $user->email }} </td>
                                    <td>
                                        <form action="{{ route('dashboard.user.remove', $user->id) }}" method="POST">
                                            @csrf
                                        <button type="submit" class="btn btn-warning btn-style-light flex-grow-1 m-r-xxs"><i class="material-icons">done</i>Reject</button>
                                        </form>
                                    </td>
                                  </tr>
                                  @empty

                                  @endforelse
                                </tbody>
                              </table>
                              {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('script_content')

    <script>
        function myFunction() {
        var x = document.getElementById("adminPasswordShow");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
    @if (session('admin_create_msg'))
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
    title: '{{ session('admin_create_msg') }}'
  })
    </script>
    @endif

    @if (session('user_remove_msg'))
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
    title: '{{ session('user_remove_msg') }}'
  })
    </script>
    @endif

    @endsection
