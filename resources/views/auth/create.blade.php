<x-layout>
    <h1 class="my-16 text-slate-500 text-4xl text-center font-semibold">
        Sign in to your account
    </h1>
    <x-card class="py-8 px-16 bg-opacity-20">
        <form action="" method="POST">
            @csrf
            <div class="mb-8">
                <label for="email" class="mb-2 block text-sm font-medium text-slate-500">Email</label>
                <x-text-input name="email" />
            </div>
            <div class="mb-8">
                <label for="password" class="mb-2 block text-sm font-medium text-slate-500">Password</label>
                <x-text-input name="password" type="password" />
            </div>

            <div class="mb-8 flex justify-between text-sm font-medium text-slate-600">
                <div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="remember" class="border border-slate-400 rounded">
                        <label for="remember">Remember Me</label>
                    </div>
                </div>
                <div>
                    <a href="#" class="text-indigo-500 hover:underline"> Forget password? </a>
                </div>
            </div>
            <x-button class="w-full border-0 bg-fuchsia-300 text-center text-white rounded py-2 font-medium hover:bg-fuchsia-400">
                LOG IN
            </x-button>
        </form>
    </x-card>
</x-layout>
