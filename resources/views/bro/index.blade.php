<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Karyawan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-xl text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">

                        <div>
                            <x-create-button href="{{ route('bro.create') }}"></x-create-button>
                        </div>

                        <div>
                            @if(session('success'))
                                <p x-data="{ show: true }" x-show="show" x-transition
                                   x-init="setTimeout(() => show = false, 5000)"
                                   class="text-sm text-green-700 dark:text-green-500">
                                    {{ session('success') }}
                                </p>
                            @endif

                            @if(session('danger'))
                                <p x-data="{ show: true }" x-show="show" x-transition
                                   x-init="setTimeout(() => show = false, 5000)"
                                   class="text-sm text-red-700 dark:text-red-500">
                                    {{ session('danger') }}
                                </p>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-100 uppercase bg-gray-800">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jabatan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Alamat
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bros as $bro)
                                <tr>
                                    <td class="px-6 py-4">
                                        {{ $bro->nama }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $bro->jabatan }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $bro->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $bro->alamat }}
                                    </td>

                                    <td class="px-6 py-3">
                                        <a href="{{ route('bro.edit', $bro) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                    </td>
                                    <td class="px-6 py-3">
                                        <form action="{{ route('bro.destroy', $bro) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:text-red-700">Delete</button></form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center">
                                        Tidak ada data karyawan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
