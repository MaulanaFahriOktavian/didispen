<x-layouts.app :title="'Dashboard Admin'">

<div class="space-y-6">

    <h1 class="text-3xl font-bold">
        Dashboard Guru Piket
    </h1>

    <div class="grid grid-cols-5 gap-4">

        <div class="bg-white rounded-xl shadow p-5">
            <p>Total</p>
            <h2 class="text-3xl font-bold">{{ $total }}</h2>
        </div>

        <div class="bg-yellow-100 rounded-xl shadow p-5">
            <p>Pending</p>
            <h2 class="text-3xl font-bold">{{ $pending }}</h2>
        </div>

        <div class="bg-green-100 rounded-xl shadow p-5">
            <p>Approved</p>
            <h2 class="text-3xl font-bold">{{ $approved }}</h2>
        </div>

        <div class="bg-blue-100 rounded-xl shadow p-5">
            <p>Sedang Keluar</p>
            <h2 class="text-3xl font-bold">{{ $out }}</h2>
        </div>

        <div class="bg-purple-100 rounded-xl shadow p-5">
            <p>Selesai</p>
            <h2 class="text-3xl font-bold">{{ $finished }}</h2>
        </div>

    </div>

    <div class="bg-white rounded-xl shadow">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-3 text-left">Kode</th>

                    <th class="p-3 text-left">Status</th>

                    <th class="p-3 text-left">Tanggal</th>

                </tr>

            </thead>

            <tbody>

            @foreach($recent as $item)

                <tr class="border-b">

                    <td class="p-3">
                        {{ $item->code }}
                    </td>

                    <td class="p-3">
                        {{ ucfirst($item->status) }}
                    </td>

                    <td class="p-3">
                        {{ $item->created_at }}
                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

</x-layouts.app>