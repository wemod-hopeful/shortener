<template>
    <div class="min-h-full">
        <div class="bg-indigo-600 pb-32">
            <Disclosure as="nav" class="border-b border-indigo-300/25 bg-indigo-600 lg:border-none" v-slot="{ open }">
                <div class="mx-auto max-w-7xl px-2 sm:px-4 lg:px-8">
                    <div class="relative flex h-16 items-center justify-between lg:border-b lg:border-indigo-400/25">
                        <div class="flex items-center px-2 lg:px-0">
                            <div class="shrink-0">
                                <img class="block w-1/2" src="https://wemod.com/static/images/wemod-logo-40777eae11.webp" alt="Your Company" />
                            </div>
                            <div class="hidden lg:ml-10 lg:block">
                                <div class="flex space-x-4">
                                    <Link v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-indigo-700 text-white' : 'text-white hover:bg-indigo-500/75', 'rounded-md px-3 py-2 text-sm font-medium']" :aria-current="item.current ? 'page' : undefined">{{ item.name }}</Link>
                                </div>
                            </div>
                        </div>

                        <div class="flex lg:hidden">
                            <!-- Mobile menu button -->
                            <DisclosureButton class="relative inline-flex items-center justify-center rounded-md bg-indigo-600 p-2 text-indigo-200 hover:bg-indigo-500/75 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-indigo-600">
                                <span class="absolute -inset-0.5" />
                                <span class="sr-only">Open main menu</span>
                                <Bars3Icon v-if="!open" class="block size-6" aria-hidden="true" />
                                <XMarkIcon v-else class="block size-6" aria-hidden="true" />
                            </DisclosureButton>
                        </div>
                    </div>
                </div>

                <DisclosurePanel class="lg:hidden">
                    <div class="space-y-1 px-2 pb-3 pt-2">
                        <DisclosureButton v-for="item in navigation" :key="item.name" as="a" :href="item.href" :class="[item.current ? 'bg-indigo-700 text-white' : 'text-white hover:bg-indigo-500/75', 'block rounded-md px-3 py-2 text-base font-medium']" :aria-current="item.current ? 'page' : undefined">{{ item.name }}</DisclosureButton>
                    </div>
                </DisclosurePanel>
            </Disclosure>

        </div>

        <main class="-mt-16">
            <div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8">
                <div class="rounded-lg bg-gray-50 px-5 py-6 shadow sm:px-6 min-h-[400px]">
                    <slot></slot>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { MagnifyingGlassIcon } from '@heroicons/vue/20/solid'
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'
import { Link } from '@inertiajs/vue3'

const navOptions = [
    { name: 'URLs', routeName: 'urls.index'},
    { name: 'Add URL', routeName: 'urls.create'},
    { name: 'Bulk Add', routeName: 'bulk.create'},
]
const navigation = [];
navOptions.forEach(option => {
    navigation.push(
        { name: option.name, href: route(option.routeName), current: route().current() === option.routeName }
    )
});
</script>
