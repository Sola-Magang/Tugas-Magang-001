<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
            <div class="flex flex-col items-center justify-center lg:my-10 px-6 py-2 mx-auto lg:py-10">
                <div class="w-full bg-gray-50 dark:bg-gray-900 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Edit Data
                        </h1>
                        <form class="space-y-4 md:space-y-2" action="{{ route('pd.update', $data->slug) }}" method="post"> @csrf
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" name="name" id="name" class="input-add-edit" placeholder="Nama Kalian" required="" value="{{ $data->name }}">
                            </div>
                            <div>
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posisi</label>
                                <select name="category" id="category" placeholder="" class="input-add-edit" required="">
                                    @foreach ($category as $cat)
                                        <option @if ($data->pos_id == $cat->id) selected="selected" @endif value="{{ $cat->id }}">{{ $cat->pos_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="place_birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                                <input type="text" name="place_birth" id="place_birth" placeholder="Kota/Kabupaten" class="input-add-edit" required="" value="{{ $data->place_birth }}">
                            </div>
                            <div>
                                <label for="date_birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                                <input type="date" name="date_birth" id="date_birth" class="input-add-edit" required="" value="{{ $data->date_birth }}">
                            </div>
                            <div>
                                <label for="school" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asal Sekolah</label>
                                <input disabled type="text" name="school" id="school" placeholder="SMA/K/P..." class="input-add-edit" required="" value="{{ $data->sekolah->name }}">
                            </div>
                            <div>
                                <label for="information" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                <textarea required="" name="information" id="information" class="input-add-edit">{{ $data->information }}</textarea>
                            </div>
                            <div class="flex justify-between">
                                <a href="\" class="max-w-md text-white bg-gray-500 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Batal</a>
                                <button type="submit" class="max-w-md text-white bg-gray-500 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </x-layout>