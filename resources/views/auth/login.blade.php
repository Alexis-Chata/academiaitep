<x-guest2-layout>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-xl-10">
            <div class="card rounded-3 text-black">
              <div class="row g-0">
                <div class="col-lg-6">
                  <div class="card-body p-md-5 mx-md-4">
                    <x-login1.authentication-card>
                        <x-slot name="logo">
                            <x-login1.authentication-card-logo />
                        </x-slot>
                    </x-login1.authentication-card>
                    <x-validation-errors class="mb-4" />
                    @session('status')
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ $value }}
                        </div>
                    @endsession
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-checkbox id="remember_me" name="remember" />
                                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-button class="ms-4">
                                {{ __('Log in') }}
                            </x-button>
                        </div>
                    </form>
                    <script>
                        email.value="test@example.com";
                        password.value="12345678";
                    </script>
                  </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center gradient-custom-2" id='fondo_card'>
                  <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                    <h2 class="mb-4">"Forjando Líderes del Mañana: La Academia Que Impulsa Tu Futuro"</h2>
                    <p class="small mb-0" style="text-align: justify;">
                        En nuestra academia preuniversitaria, creemos en el poder del conocimiento
                        para transformar vidas. No solo te preparamos para los exámenes de admisión más exigentes, sino que también cultivamos en
                        ti las habilidades y la confianza necesarias para superar cualquier desafío académico y personal. Con un enfoque innovador
                        y personalizado, nuestros profesores te guían paso a paso hacia el éxito, asegurando que cada estudiante descubra su máximo
                         potencial. Aquí, tu futuro no es un sueño lejano, es una meta alcanzable. ¡Prepárate para brillar!
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</x-guest2-layout>
