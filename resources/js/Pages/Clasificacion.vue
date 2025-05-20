<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

const props = defineProps({
    ranking: Object,
});

console.log(props.ranking);

function goToPage(url) {
    if (url) {
        router.visit(url, {
            preserveScroll: true,
            preserveState: true,
        });
    }
}
</script>

<template>
    <Head title="Clasificación" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-4xl mx-auto px-4 sm:px-8">
                <h1 class="text-2xl font-bold mb-6">Clasificación</h1>

                <div class="overflow-x-auto w-full">
                    <table
                        class="min-w-full bg-white shadow rounded-lg overflow-hidden w-max"
                    >
                        <thead class="bg-gray-200 text-left">
                            <tr>
                                <th class="p-3">#</th>
                                <th class="p-3">Usuario</th>
                                <th class="p-3">Categoría</th>
                                <th class="p-3">Puntuación</th>
                                <th class="p-3">Tiempo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(partida, index) in ranking.data"
                                :key="partida.id"
                                class="border-b hover:bg-gray-50"
                            >
                                <td class="p-3">
                                    {{
                                        (ranking.meta.current_page - 1) *
                                            ranking.meta.per_page +
                                        index +
                                        1
                                    }}
                                </td>
                                <td class="p-3">
                                    {{ partida.usuario ?? "Anónimo" }}
                                </td>
                                <td class="p-3">
                                    {{ partida.categoria ?? "Sin categoría" }}
                                </td>
                                <td class="p-3">{{ partida.puntuacion }}</td>
                                <td class="p-3">{{ partida.tiempo }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="mt-6 flex justify-center space-x-2">
                    <Link
                        v-for="link in ranking.meta.links"
                        :key="link.label"
                        :href="link.url"
                        :disabled="!link.url"
                        @click="goToPage(link.url)"
                        v-html="link.label"
                        :class="[
                            'px-3 py-1 rounded',
                            link.active
                                ? 'bg-blue-500 text-white'
                                : 'bg-gray-200',
                            !link.url && 'opacity-50 cursor-not-allowed',
                        ]"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
