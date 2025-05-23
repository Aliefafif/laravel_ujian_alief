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
        <h1 class="text-2xl font-bold text-gray-900 mb-5">Mobil</h1>

     
        <div class="flex flex-col md:flex-row mx-2 max-w-md">
    <div class="mb-2 border-solid border-gray- rounded border shadow-sm w-full">
        <div class="bg-gray-200 px-5 py-3 border-solid border-gray-200 border-b">
            Lihat
        </div>
        
        <table class="table table-bordered">

                        <tr >
                            <th>Nama Mobil</th>
                            <td>{{$mobil->nama_mobil}}</td>
                        </tr>
                        <tr >
                            <th>DESKRIPSI</th>
                            <td>{{$mobil->deskripsi}}</td>
                        </tr>
                        <tr >
                            <th>Harga</th>
                            <td>{{$mobil->harga}}</td>
                        </tr>
                        <tr >
                            <th>Stok</th>
                            <td>{{$mobil->stok}}</td>
                        </tr>
                        <tr >
                            <th>Jenis</th>
                            <td>{{$mobil->jenis->nama_jenis}}</td>
                        </tr>
                        <tr >
                            <th>Merk</th>
                            <td>{{$mobil->merk->nama_merk}}</td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td>
                                @if ($mobil->foto)
                                    <img src="{{ Storage::url('images/' . $mobil->foto) }}" alt="Foto Produk" 
                                         class="img-thumbnail" width="150">
                                @else
                                    <p>Tidak ada foto</p>
                                @endif
                            </td>
                        </tr>

                        
                    </table>
                    <a href="{{ route('mobil.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Kembali</a>
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