<template>
    <div class="bg-gray-200 shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <div class="flex items-center">
                {{percentComplete()}}% Complete <div v-if="percentComplete() !== 100" class="ml-2 animate-spin rounded-full h-4 w-4 border-t-4 border-b-4 border-indigo-300"></div>
            </div>

            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{successes.length}} short URLs created successfully</h3>
            <div v-for="pair in successes" class="grid grid-cols-2 max-w-xl text-md text-gray-500 gap-x-2">
                    <span>
                        {{pair.originalUrl}}
                    </span>
                    <span>
                        <a :href="pair.shortUrl" target="_blank" class="font-semibold text-indigo-600 hover:text-indigo-500">
                            {{pair.shortUrl}}
                            <span aria-hidden="true"> &rarr;</span>
                        </a>
                    </span>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mt-2 mb-2">{{failures.length}} values were invalid</h3>
            <div v-for="failure in failures" class="max-w-xl text-md text-gray-500 gap-x-2">
                <div>{{failure}}</div>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    successes: {
        type: Array,
        default: () => [],
    },
    failures: {
        type: Array,
        default: () => [],
    },
    total: {
        type: Number,
        default: 0
    }
})

console.log(props);
function percentComplete() {
    if (props.total === 0) {
        return 0;
    }
    return Math.floor((props.successes.length + props.failures.length) / props.total * 100);
}
</script>
