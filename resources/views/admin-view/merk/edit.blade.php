<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords"
        content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('admin/dist/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Dashboard | Tailwind Admin</title>
</head>

<body>
    <!--Container -->
    <div class="mx-auto bg-gray-100">
        <div class="min-h-screen flex flex-col">
            <!-- Header -->
            @include('layouts.components-admin.header')

            <div class="flex flex-1">
                <!-- Sidebar -->
                @include('layouts.components-admin.sidebar')

                <!-- Main Content -->
<main class="bg-gray-100 flex-1 p-6 overflow-auto">
    <div class="flex flex-col">
        <!-- Judul Halaman -->
        <h1 class="text-2xl font-bold text-gray-900 mb-5">Merk</h1>

        <!-- Card -->
        <div class="flex flex-col md:flex-row mx-2 max-w-md">
    <div class="mb-2 border-solid border-gray- rounded border shadow-sm w-full">
        <div class="bg-gray-200 px-3 py-3 border-solid border-gray-200 border-b">
            Rubah
        </div>
        <form action="{{ route('merk.update',$merk->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4 px-6 py-4">
                        <label for="nama">Nama</label>
                            <input type="text" class="w-full px-6 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500" name="nama_merk" value="{{$merk->nama_merk}}">
                        </div>
                         <!-- Menampilkan Pesan Error -->
                         @if($errors->has('nama_merk'))
                          <div class="mt-2 text-sm text-red-500">
                        {{ $errors->first('nama_merk') }}
                        </div>
                         @endif

                        <div class="mt-4 px-4 py-4 flex-col">            
                         <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                        Ubah</button>
                        </div>
                    </form>
    </div>
</div>
                        </div>
                    </div>
                    <!--/Grid Form-->
    </div>
</main>

            </div>
        </div>
    </div>

    <script src="{{ asset('admin/main.js') }}"></script>
</body>

</html>