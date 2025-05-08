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
            @include('layouts.components.header')

            <div class="flex flex-1">
                <!-- Sidebar -->
                @include('layouts.components.sidebar')

                <!-- Main Content -->
<main class="bg-gray-100 flex-1 p-6 overflow-auto">
    <div class="flex flex-col">
        <!-- Judul Halaman -->
        <h1 class="text-2xl font-bold text-gray-800 mb-5">Jenis <hr></h1>
        

        <!-- Card -->
        <div class="bg-white shadow rounded p-6 w-full">
            <!-- Tombol Tambah -->
            <div class="mb-4 flex justify-start">
                <a href="{{ route('jenis.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Tambah
                </a>
            </div>

            <!-- Alert -->
            @if (session('success'))
                <div id="alert-success" onclick="hideAlert()" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 cursor-pointer transition-opacity duration-500">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabel -->
            <div class="overflow-x-auto">
                <table class="min-w-full text-left">
                    <thead class="bg-gray-100 text-gray-700 border-b">
                        <tr>
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Jenis</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($jenis as $data)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $no++ }}</td>
                                <td class="px-4 py-2">{{ $data->nama_jenis }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('jenis.show', $data->id) }}"
                                        class="bg-yellow-400 hover:bg-yellow-500 text-white rounded p-1 mx-1 inline-block">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('jenis.edit', $data->id) }}"
                                        class="bg-orange-400 hover:bg-orange-500 text-white rounded p-1 mx-1 inline-block">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('jenis.destroy', $data->id) }}" method="POST"
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

    <!-- Script untuk menyembunyikan alert -->
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

