<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords"
        content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <link rel="stylesheet" href="{{ asset('admin/dist/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Dashboard | Tailwind Admin</title>
</head>

<body>
    <div class="mx-auto bg-gray-100">
        <div class="min-h-screen flex flex-col">
            @include('layouts.components.header')

            <div class="flex flex-1">
                @include('layouts.components.sidebar')

                <main class="bg-gray-100 flex-1 p-6 overflow-auto">
                    <div class="flex flex-col">
                        <h1 class="text-2xl font-bold text-gray-800 mb-5">Mobil <hr></h1>


                        <div class="bg-white shadow rounded p-6 w-full">
                            <div class="mb-4 flex justify-start">
                                <a href="{{ route('mobil.create') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Tambah
                                </a>
                            </div>

                            @if (session('success'))
                                <div id="alert-success" onclick="hideAlert()"
                                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 cursor-pointer transition-opacity duration-500">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="overflow-x-auto">
                                <table class="min-w-full text-left">
                                    <thead class="bg-gray-100 text-gray-700 border-b">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Mobil</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Stok</th>
                                            <th scope="col">Jenis</th>
                                            <th scope="col">Merk</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($mobil as $data)
                                            <tr class="border-b hover:bg-gray-50">
                                                <td scope="row">{{ $no++ }}</td>
                                                <td scope="row">{{ $data->nama_mobil}}</td>
                                                <td scope="row">{{ $data->harga}}</td>
                                                <td scope="row">{{ $data->stok}}</td>
                                                <td scope="row">{{ $data->jenis->nama_jenis}}</td>
                                                <td scope="row">{{ $data->merk->nama_merk}}</td>
                                              
                                                <td>
                                            <img src="{{ asset('storage/images/' . $data->foto) }}" alt=""
                                                 style="width: 50px; height:50px;">
                                             </td>
                                                                  <td class="px-4 py-2">
                                                    <a href="{{ route('mobil.show', $data->id) }}"
                                                        class="bg-yellow-400 hover:bg-yellow-500 text-white rounded p-1 mx-1 inline-block">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('mobil.edit', $data->id) }}"
                                                        class="bg-orange-400 hover:bg-orange-500 text-white rounded p-1 mx-1 inline-block">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('mobil.destroy', $data->id) }}" method="POST"
                                                        class="inline-block"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="bg-red-500 hover:bg-red-600 text-white rounded p-1 mx-1">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

            </div>
        </div>
    </div>

    <script src="{{ asset('admin/main.js') }}"></script>

    <script>
        function hideAlert() {
            const alert = document.getElementById('alert-success');
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 500);
            }
        }

        setTimeout(() => {
            hideAlert();
        }, 3000);
    </script>
</body>

</html>