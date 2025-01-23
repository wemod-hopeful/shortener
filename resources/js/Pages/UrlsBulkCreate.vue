<template>
    <Layout>
        <BulkShortenResult v-if="batchId" :successes="batchData.successes" :failures="batchData.failures" :total="batchData.total" class="mb-4"></BulkShortenResult>

        <div>
            <form @submit.prevent="form.post(route('bulk.store'))">
                <div>Upload a CSV file containing valid URLs. (Try using <span class="bg-gray-500 text-white rounded-md pl-1 pr-1">storage/csv/1000.csv</span>)</div>
                <input type="file" @input="form.csv = $event.target.files[0]" class="block rounded-md bg-indigo-300 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"/>
                <div class="text-red-500">{{form.errors.csv}}</div>
                <progress v-if="form.progress" :value="form.progress.percentage" max="100" class="block mt-4">
                    {{ form.progress.percentage }}%
                </progress>
                <Button type="submit" class="mt-4">Upload</Button>
            </form>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "@/Layouts/Layout.vue";
import Button from "@/Components/Button.vue";
import { useForm } from '@inertiajs/vue3'
import ShortUrl from "@/Components/ShortenResult.vue";
import {onMounted, ref, watch} from "vue";
import BulkShortenResult from "@/Components/BulkShortenResult.vue";
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    batchId: {
        type: String,
        default: null
    }
});

const form = useForm({
    csv: null,
});

const batchData = ref({});

function pollRoute(url, interval = 5000) {
    const fetchData = () => {
        axios.get(url)
            .then(response => {
                // Handle the response data
                batchData.value = response.data
            })
            .catch(error => {
                console.error('Error:', error);
                // Handle errors (e.g., retry logic or stop polling if necessary)
            })
            .finally(() => {
                // Schedule the next poll
                if (!batchData.value.completed) {
                    setTimeout(fetchData, interval);
                }
            });
    };

    // Start the initial poll
    fetchData();
}

watch(() => props.batchId, (newValue, oldValue) => {
    pollRoute(route('api.batch.show', newValue), 100); // Polls every 5 seconds
});

</script>
