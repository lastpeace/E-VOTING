<div>
    <form action=" {{ url('kandidat/'.$data->id_calon) }} " method="POST" enctype="multipart/form-data">
        @csrf
@method('PUT')
        <div>
            <label class="block font-medium text-md" for="nama_kandidat">Nama Kandidat</label>
            <input class="placeholder:italic rounded-full h-7 w-full" type="text" name="nama_kandidat" placeholder="Masukkan Kandidat" value=" {{ $data->nama_kandidat }} ">
        </div>
        <div>
            <label class="block font-medium text-md" for="foto">Upload Foto</label>
            @if ($data->foto)
        <img class="p-2 h-[120px]" src="{{ url('foto').'/'.$data->foto }}" alt="">
    @endif
            <input class="py-1 rounded-full w-full file:mr-4 file:py-2 text-sm file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 file:cursor-pointer" type="file" name="foto" id="foto" accept="image/*" placeholder="Masukkan Kandidat">
        </div>
        <div class="py-3">
            <label class="block font-medium text-md pb-2" for="visi">Visi</label>
            <textarea class="tinymce rounded-[30px] w-full placeholder:italic" name="misi" id="misi" cols="30" rows="10" placeholder="Masukkan misi">{{ $data->misi }}</textarea>
        </div>
        <div class="py-3">
            <label class="block font-medium text-md pb-2" for="misi">Misi</label>
            <textarea class="tinymce rounded-[30px] w-full placeholder:italic" name="misi" id="misi" cols="30" rows="10" placeholder="Masukkan misi">{{ $data->misi }}</textarea>
        </div>
        @if ($errors->any())
        <div class="text-red-500 text-sm">
            <ul>
                @foreach ($errors->all() as $item)
                <li>{{$item}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="text-end mt-1">
            <a class="bg-red-500 text-white py-2.5 px-4 rounded-full shadow-md hover:bg-red-600 text-sm font-semibold transition-all ease-in-out cursor-pointer mt-1"
                href="{{ route('kandidat.index') }}">Back</a>
            <input
                class="bg-green-500 text-white p-2.5 rounded-full shadow-md hover:bg-green-600 text-sm font-semibold transition-all ease-in-out cursor-pointer mt-1"
                type="submit" name="create">
        </div>
    </form>
</div>