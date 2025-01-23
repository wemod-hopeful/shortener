<template>
    <Layout>
        <ShortenResult v-if="shortUrl" :short-url="shortUrl" :original-url="originalUrl" class="mb-4"></ShortenResult>
        <div>
            <form @submit.prevent="form.post(route('urls.store'))">
                <label for="email" class="block text-sm/6 font-medium text-gray-900">Enter a URL to shorten</label>
                <div class="mt-2">
                    <input type="url" v-model="form.url" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="https://example.com" />
                    <span class="text-red-500">{{form.errors.url}}</span>
                </div>
                <Button type="submit" class="mt-4">Shorten</Button>
            </form>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "@/Layouts/Layout.vue";
import Button from "@/Components/Button.vue";
import { useForm } from '@inertiajs/vue3'
import ShortenResult from "@/Components/ShortenResult.vue";

const props = defineProps({
    shortUrl: {
        type: String,
        required: false
    },
    originalUrl: {
        type: String,
        required: false
    }
})
const form = useForm({
    url: null,
})
</script>
