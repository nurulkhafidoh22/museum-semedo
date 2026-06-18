@props([
    'step' => 1,
    'label1' => 'Isi Data',
    'label2' => 'Pembayaran',
    'label3' => 'E-Ticket'
])

<div class="max-w-4xl mx-auto mb-10 md:mb-14 px-2">

    <div class="flex items-start justify-between">

        {{-- STEP 1 --}}
        <div class="flex-1 text-center">
            <div class="w-9 h-9 md:w-11 md:h-11 mx-auto
                        rounded-full
                        flex items-center justify-center
                        font-bold
                        relative z-10
                        {{ $step == 1
                            ? 'bg-[#0f2a2c] text-white'
                            : ($step > 1
                                ? 'bg-[#1ecad3] text-[#0f2a2c]'
                                : 'bg-gray-300 text-gray-600') }}">
                1
            </div>

            <p class="mt-2 text-[11px] sm:text-sm font-semibold leading-tight
                {{ $step >= 1 ? 'text-[#0f2a2c]' : 'text-gray-500' }}">
                {{ $label1 }}
            </p>
        </div>

        {{-- GARIS 1 --}}
        <div class="flex-1 pt-4 md:pt-5">
            <div class="h-[2px]
                {{ $step > 1 ? 'bg-[#1ecad3]' : 'bg-gray-300' }}">
            </div>
        </div>

        {{-- STEP 2 --}}
        <div class="flex-1 text-center">
            <div class="w-9 h-9 md:w-11 md:h-11 mx-auto
                        rounded-full
                        flex items-center justify-center
                        font-bold
                        relative z-10
                        {{ $step == 2
                            ? 'bg-[#0f2a2c] text-white'
                            : ($step > 2
                                ? 'bg-[#1ecad3] text-[#0f2a2c]'
                                : 'bg-gray-300 text-gray-600') }}">
                2
            </div>

            <p class="mt-2 text-[11px] sm:text-sm font-semibold leading-tight
                {{ $step >= 2 ? 'text-[#0f2a2c]' : 'text-gray-500' }}">
                {{ $label2 }}
            </p>
        </div>

        {{-- GARIS 2 --}}
        <div class="flex-1 pt-4 md:pt-5">
            <div class="h-[2px]
                {{ $step > 2 ? 'bg-[#1ecad3]' : 'bg-gray-300' }}">
            </div>
        </div>

        {{-- STEP 3 --}}
        <div class="flex-1 text-center">
            <div class="w-9 h-9 md:w-11 md:h-11 mx-auto
                        rounded-full
                        flex items-center justify-center
                        font-bold
                        relative z-10
                        {{ $step == 3
                            ? 'bg-[#0f2a2c] text-white'
                            : 'bg-gray-300 text-gray-600' }}">
                3
            </div>

            <p class="mt-2 text-[11px] sm:text-sm font-semibold leading-tight
                {{ $step == 3 ? 'text-[#0f2a2c]' : 'text-gray-500' }}">
                {{ $label3 }}
            </p>
        </div>

    </div>

</div>