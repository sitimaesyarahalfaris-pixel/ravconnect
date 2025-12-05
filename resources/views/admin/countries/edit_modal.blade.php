<div x-data="{ open: false, country: null }" @open-edit-country.window="open = true; country = $event.detail">
    <template x-if="open">
        <div class="fixed inset-0 bg-black/40 z-50 flex items-center justify-center">
            <div class="bg-white rounded-xl shadow-xl p-8 w-full max-w-md relative">
                <button @click="open = false" class="absolute top-3 right-3 text-gray-400 hover:text-black text-xl">&times;</button>
                <h2 class="font-bold text-xl mb-4">Edit Country</h2>
                <form method="POST" :action="'/admin/countries/update'" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" :value="country.id">
                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Country Name</label>
                        <input type="text" name="name" class="w-full border rounded p-2" :value="country.name">
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Country Code</label>
                        <input type="text" name="code" class="w-full border rounded p-2" :value="country.code">
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Flag/Image URL</label>
                        <input type="text" name="flag_url" class="w-full border rounded p-2" :value="country.flag_url">
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Upload Image</label>
                        <input type="file" name="image_url" class="w-full border rounded p-2">
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="px-6 py-2 bg-[#FFC50F] rounded font-bold">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </template>
</div>
