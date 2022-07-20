<div>

    <div class=" ">

        <form action="#" method="post" wire:submit.prevent="upload">
            <input type="file" wire:model="photo">
            @error('photo')
                <p class="font-bold text-red-300">{{ $message }}</p>
            @enderror
            <button type="submit"
                class="border rounded shadow bg-blue-500 text-white font-bold p-2 hover:bg-blue-600">Upload Foto</button>
        </form>
    </div>

</div>
