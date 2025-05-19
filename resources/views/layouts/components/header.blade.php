<header class="bg-nav">
    <div class="flex justify-between items-center px-4 py-2">
        <!-- Kiri: Logo & Judul -->
        <div class="flex items-center space-x-3">
            <img onclick="profileToggle()" class="h-8 w-8 rounded-full cursor-pointer" src="{{asset('storage/images/gtr.jpg')}}" alt="Profile">
            <h1 class="text-white text-lg p-2">My Project</h1>
        </div>

        <!-- Kanan: Profile -->
        <div class="relative">
            <div class="flex items-center cursor-pointer" onclick="profileToggle()">
                <img class="h-8 w-8 rounded-full" src="{{asset('storage/images/logo1.webp')}}" alt="Profile">
                <span class="text-white px-2 hidden md:block">Alief</span>
            </div>

            <!-- Dropdown -->
            <div id="ProfileDropDown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded shadow-md z-50">
                <ul class="list-none">
                    <li><a href="#" class="block px-4 py-2 text-black hover:bg-gray-100">My account</a></li>
                    <li><a href="#" class="block px-4 py-2 text-black hover:bg-gray-100">Notifications</a></li>
                    <li><hr class="border-t mx-2 my-1 border-gray-200"></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </li>             
                   </ul>
            </div>
        </div>
    </div>
</header>

<!-- Tambahkan script ini sebelum tag </body> -->
<script>
    function profileToggle() {
        var dropdown = document.getElementById("ProfileDropDown");
        dropdown.classList.toggle("hidden");
    }

    // Optional: klik di luar dropdown akan menutup dropdown
    window.addEventListener('click', function(e) {
        const dropdown = document.getElementById("ProfileDropDown");
        const button = dropdown.previousElementSibling;

        if (!dropdown.contains(e.target) && !button.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>
