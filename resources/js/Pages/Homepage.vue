<template>
    <div class="bg-white">
        <div class="relative isolate overflow-hidden bg-gradient-to-b from-indigo-100/20">
            <div class="mx-auto max-w-7xl pb-24 pt-10 sm:pb-32 lg:grid lg:grid-cols-2 lg:gap-x-8 lg:px-8 lg:py-40">
                <div class="px-6 lg:px-0 lg:pt-4">
                    <div class="mx-auto max-w-2xl">
                        <div class="max-w-lg">
                            <Link :href="route('home')"><img class="h-11" src="https://wemod.com/static/images/wemod-logo-40777eae11.webp" alt="Your Company" /></Link>

                            <h1 class="mt-10 text-pretty text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl">Say goodbye to long URLs</h1>
                            <p class="mt-8 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">Simple. Easy. Short. Experience the unrivaled convenience of shortened URLs.</p>
                            <div class="mt-10 flex items-center gap-x-6">
                                <Link :href="route('urls.index')" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get Started</Link>
                                <a href="https://github.com/wemod-hopeful/shortener" target="_blank" class="text-sm/6 font-semibold text-gray-900">View on GitHub <span aria-hidden="true">→</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-20 sm:mt-24 md:mx-auto md:max-w-2xl lg:mx-0 lg:mt-40 lg:w-screen">
                    <div class="absolute inset-y-0 right-1/2 -z-10 -mr-10 w-[200%] skew-x-[-30deg] bg-white shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 md:-mr-20 lg:-mr-36" aria-hidden="true" />
                    <div class="shadow-lg md:rounded-3xl">
                        <div class="bg-indigo-500 [clip-path:inset(0)] md:[clip-path:inset(0_round_theme(borderRadius.3xl))]">
                            <div class="absolute -inset-y-px left-1/2 -z-10 ml-10 w-[200%] skew-x-[-30deg] bg-indigo-100 opacity-20 ring-1 ring-inset ring-white md:ml-20 lg:ml-36" aria-hidden="true" />
                            <div class="relative px-6 pt-8 sm:pt-2  md:pr-0 pb-2">
                                <div class="mx-auto max-w-2xl md:mx-0 md:max-w-none">
                                    <div class="font-bold text-white line-through text-xs">https://www.wemod.com/maps/horizon-forbidden-west-complete-edition/burning-shores</div>
                                    <div class="font-bold text-white text-2xl">https://weshort.com/17dwd19</div>
                                    <div class="text-gray-200 text-xs">(Example for illustrative purposes only)</div>
                                </div>

                                <div class="pointer-events-none absolute inset-0 ring-1 ring-inset ring-black/10 md:rounded-3xl" aria-hidden="true" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute inset-x-0 bottom-0 -z-10 h-24 bg-gradient-to-t from-white sm:h-32" />
        </div>
    </div>
</template>

<script setup>
import { ChevronRightIcon } from '@heroicons/vue/20/solid'
import {Link} from "@inertiajs/vue3";
</script>
