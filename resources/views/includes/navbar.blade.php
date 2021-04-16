<div class="container mx-auto md:px-20 px-2">
    <div class="flex justify-between whitespace-no-wrap overflow-x-auto overflow-y-hidden py-2">
        <a href="{{ route('edit', $datos)}}" class="flex items-center" style="min-width:16rem;">
            <img src="/laravel/acta/public/uploads/{{Auth::user()->avatar}}" alt="{{ Auth::user()->name}}" class="w-10 h-10 rounded-full mr-12 md:mr-0">
            <div class="px-2">
                    <p class="text-blue-700 text-3xl font-mono"> {{ Auth::user()->name}}</p>
            </div>
        </a>
        <form action="{{ route('logout')}}" method="POST">
            @csrf
            <a href="#" onclick="this.closest('form').submit() "class="bg-red-500 hover:bg-red-700 text-white font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                Logout
            </a>
        </form>
    </div>
</div>
