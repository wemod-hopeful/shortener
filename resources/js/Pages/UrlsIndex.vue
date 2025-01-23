<template>
    <Layout>
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold text-gray-900">URLs</h1>
                    <p class="mt-2 text-sm text-gray-700">A paginated list of URLs in the system.</p>
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <Link :href="route('urls.create')"><button type="button" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add URL</button></Link>
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3">Original URL</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Short URL</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Request Count</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Last Requested</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                            <tr v-for="url in urls.data" :key="url.encoded_id" class="even:bg-gray-50">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ url.originalUrl }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ url.shortUrl }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ url.requestCount }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ url.lastRequestedAt ?? 'Never' }}</td>
                            </tr>
                            </tbody>

                        </table>
                        <Pagination class="mt-2" :links="urls.links" :meta="urls.meta"></Pagination>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "@/Layouts/Layout.vue";
import {Link} from "@inertiajs/vue3";
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
    urls: Object,
});

const people = [
    { name: 'Lindsay Walton', title: 'Front-end Developer', email: 'lindsay.walton@example.com', role: 'Member' },
    // More people...
]
</script>
