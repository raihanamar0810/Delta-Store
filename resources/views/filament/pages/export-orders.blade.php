<x-filament-panels::page>
    <div class="space-y-6">

        {{-- PILIH PERIODE --}}
        <x-filament::section heading="Pilih Periode Rekap">
            <div class="flex flex-wrap gap-3">
                @foreach([
                    '1week'  => '1 Minggu',
                    '1month' => '1 Bulan',
                    '3month' => '3 Bulan',
                    '1year'  => '1 Tahun',
                ] as $value => $label)
                    <x-filament::button
                        wire:click="$set('period', '{{ $value }}')"
                        :color="$period === $value ? 'primary' : 'gray'"
                    >
                        {{ $label }}
                    </x-filament::button>
                @endforeach
            </div>

            <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">
                Periode dipilih:
                <strong>
                    @switch($period)
                        @case('1week')  1 Minggu Terakhir @break
                        @case('1month') 1 Bulan Terakhir @break
                        @case('3month') 3 Bulan Terakhir @break
                        @case('1year')  1 Tahun Terakhir @break
                    @endswitch
                </strong>
            </p>
        </x-filament::section>

        {{-- STATISTIK PERIODE --}}
        @php
            $startDate = match($period) {
                '1week'  => now()->subWeek(),
                '1month' => now()->subMonth(),
                '3month' => now()->subMonths(3),
                '1year'  => now()->subYear(),
            };

            $orders         = \App\Models\Order::where('status', 'done')->where('created_at', '>=', $startDate);
            $totalPemasukan = (clone $orders)->sum('subtotal');
            $totalPesanan   = (clone $orders)->count();
            $rataRata       = $totalPesanan > 0 ? $totalPemasukan / $totalPesanan : 0;
        @endphp

        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">

            <x-filament::section>
                <p class="text-sm text-gray-500 dark:text-gray-400">Total Pemasukan</p>
                <p class="text-2xl font-bold text-success-600">
                    Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
                </p>
            </x-filament::section>

            <x-filament::section>
                <p class="text-sm text-gray-500 dark:text-gray-400">Total Pesanan Selesai</p>
                <p class="text-2xl font-bold text-primary-600">
                    {{ $totalPesanan }} pesanan
                </p>
            </x-filament::section>

            <x-filament::section>
                <p class="text-sm text-gray-500 dark:text-gray-400">Rata-rata per Pesanan</p>
                <p class="text-2xl font-bold text-warning-600">
                    Rp {{ number_format($rataRata, 0, ',', '.') }}
                </p>
            </x-filament::section>

        </div>

    </div>
</x-filament-panels::page>
