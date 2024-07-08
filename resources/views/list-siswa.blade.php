{{-- {{ use Carbon\Carbon; }} --}}
<?php use Carbon\Carbon;?>
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- <style>
        *{
            border: 1px solid red;
        }
    </style> --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="py-2 px-4 mx-auto max-w-screen-2xl lg:py-16 lg:px-2">

            <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2">
                <div class="lg:block md:hidden max-w-36">
                    
                </div>
                    <a href="{{ route('show') }}">    
                        <div class="text-center lg:mb-8 mb-8 mx-auto max-w-screen-sm" >
                            <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ $title . ' ' . $school }}</h2>
                        </div> 
                    </a>
                <div class="max-w-36 md:justify-self-end justify-self-center my-auto">
                    <a href="{{ route('pd.add') }}" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 transition-colors lg:place-content-end transition-colors">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                          <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Tambah Data
                    </a>
                </div>

            </div>
            
            <div class="grid place-content-end">
            </div>
            
            <div class="grid gap-4 py-4 px-2 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1">
                @forelse ($students as $student)
                    <article class="grid p-4 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-between items-center mb-5 text-gray-500">
                            <a href="/?category={{ $student->pos->slug }}">
                                <span class="bg-{{ $student->pos->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                    {{ $student->pos->pos_name }}
                                </span>
                            </a>
                            <span class="text-sm">{{ $student->created_at->diffForHumans() }}</span>
                        </div>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">Data siswa </a></h2>
                        <table>
                            <tr>
                                <td class="mb-5 font-black text-gray-600 dark:text-gray-400">Nama</td>
                                <td>:</td>
                                <td>{{ $student['name'] }}</td>
                            </tr>
                            <tr>
                                <td class="mb-5 font-black text-gray-600 dark:text-gray-400">Tempat Tanggal Lahir</td>
                                <td>:</td>
                                <td>{{ $student['place_birth'] }}, {{ Carbon::parse($student['date_birth'])->format('j F Y') }}</td>
                            </tr>
                            <tr>
                                <td class="mb-5 font-black text-gray-600 dark:text-gray-400">Sekolah</td>
                                <td>:</td>
                                <td>{{ $student['school'] }}</td>
                            </tr>
                            <tr>
                                <td class="mb-5 font-black text-gray-600 dark:text-gray-400">Keterangan</td>
                                <td>:</td>
                                <td class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ $student['information'] }}</td>
                            </tr>
                        </table>
                        <div class="py-8 flex justify-between items-center">
                            <form action="{{ route('pd.delete',$student->slug) }}" method="post">
                                @csrf
                                <button href="#" class="text-white bg-gray-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 transition-colors">
                                Delete
                                </button>
                            </form>
                            <a href="{{ route('pd.edit', $student->slug) }}" class="text-white bg-gray-500 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 transition-colors">
                                Edit
                            </a>
                        </div>
                    </article>
                @empty
                    <p>No Data Found</p>
                @endforelse
            </div>  
            <p>{{ count($students) }} data found</p>
        </div>
      </section>
</x-layout>