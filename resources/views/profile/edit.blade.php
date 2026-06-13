<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pengaturan Akun
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

        </div>
    </div>

    {{-- SWEETALERT --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('status') === 'password-updated')

    <script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Password berhasil diperbarui',
        confirmButtonColor: '#062b30'
    }).then(() => {

        @if(auth()->user()->role === 'admin')
            window.location.href = "{{ route('admin.dashboard') }}";
        @else
            window.location.href = "{{ url('/scan') }}";
        @endif

    });
    </script>

    @endif

    @if (session('status') === 'profile-updated')

    <script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Profil berhasil diperbarui',
        confirmButtonColor: '#062b30'
    });
    </script>

    @endif

    </script>

    {{-- SWEETALERT ERROR VALIDASI --}}
    @if ($errors->any())

    <script>

    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        html: `
            @foreach($errors->all() as $error)
                <div style="margin-bottom:5px;">{{ $error }}</div>
            @endforeach
        `,
        confirmButtonColor: '#dc2626'
    });

    </script>

    @endif
</x-app-layout>