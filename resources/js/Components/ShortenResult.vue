<template>
    <div class="bg-gray-200 shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-base font-semibold text-gray-900">Short URL Created</h3>
            <div class="mt-2 max-w-xl text-sm text-gray-500">
                <p>{{originalUrl}}</p>
            </div>
            <div class="mt-3 text-sm/6">
                <a :href="shortUrl" target="_blank" class="font-semibold text-xl text-indigo-600 hover:text-indigo-500">
                    {{shortUrl}}
                    <span aria-hidden="true"> &rarr;</span>
                </a>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    shortUrl: String,
    originalUrl: String
})
</script>
