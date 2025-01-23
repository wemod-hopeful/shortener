<template>
    <Layout>
        <div class="max-w-4xl mx-auto p-6">
            <h1 class="text-3xl font-bold mb-4">API Documentation</h1>

            <!-- Endpoint Details -->
            <section class="mb-8">
                <h2 class="text-2xl font-semibold">GET /api/analytics</h2>
                <p class="text-gray-700">Retrieve analytics data for a given URL, which can be either a short URL or an original URL.</p>
            </section>

            <!-- Query Parameters -->
            <section class="mb-8">
                <h3 class="text-xl font-semibold mb-2">Query Parameters</h3>
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2 text-left">Parameter</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Type</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Required</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">url</td>
                        <td class="border border-gray-300 px-4 py-2">string</td>
                        <td class="border border-gray-300 px-4 py-2">Yes</td>
                        <td class="border border-gray-300 px-4 py-2">The URL to retrieve analytics for. Can be either a short URL or the original URL.</td>
                    </tr>
                    </tbody>
                </table>
            </section>

            <!-- Response Structure -->
            <section class="mb-8">
                <h3 class="text-xl font-semibold mb-2">Response</h3>
                <p class="text-gray-700">The endpoint returns a JSON object with the following fields:</p>
                <table class="min-w-full border-collapse border border-gray-300 mt-4">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2 text-left">Field</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Type</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">originalUrl</td>
                        <td class="border border-gray-300 px-4 py-2">string</td>
                        <td class="border border-gray-300 px-4 py-2">The original (long) URL.</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">shortUrl</td>
                        <td class="border border-gray-300 px-4 py-2">string</td>
                        <td class="border border-gray-300 px-4 py-2">The shortened version of the URL.</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">requestCount</td>
                        <td class="border border-gray-300 px-4 py-2">integer</td>
                        <td class="border border-gray-300 px-4 py-2">The number of times the URL has been requested.</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">lastRequestedAt</td>
                        <td class="border border-gray-300 px-4 py-2">string (ISO 8601)</td>
                        <td class="border border-gray-300 px-4 py-2">The timestamp of the most recent request.</td>
                    </tr>
                    </tbody>
                </table>
            </section>

            <!-- Example Response -->
            <section class="mb-8">
                <h3 class="text-xl font-semibold mb-2">Example Response</h3>
                <pre class="bg-gray-900 text-white p-4 rounded-md overflow-auto">
{
    "originalUrl": "https://www.wemod.com/maps/horizon-forbidden-west-complete-edition/burning-shores",
    "shortUrl": "https://{application-host}/go/abc123",
    "requestCount": 42,
    "lastRequestedAt": "2025-01-23T16:22:48.000000Z"
}
            </pre>
            </section>

            <!-- Example Request -->
            <section>
                <h3 class="text-xl font-semibold mb-2">Example Request</h3>
                <pre class="bg-gray-900 text-white p-4 rounded-md overflow-auto">
GET /api/analytics?url=https://{application-host}/go/abc123 HTTP/1.1
Host: {application-host}
</pre>
            </section>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "@/Layouts/Layout.vue";
import Button from "@/Components/Button.vue";
import { useForm } from '@inertiajs/vue3'
import ShortenResult from "@/Components/ShortenResult.vue";

</script>
