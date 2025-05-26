<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, router } from "@inertiajs/vue3";
import { computed, ref } from "vue";

const props = defineProps({
    ranking: Object,
    categorias: Array,
    filtros: Object,
});

function translateLabel(label) {
    if (String(label).includes("Previous")) {
        label = String(label).replace("Previous", "Anterior");
    } else if (String(label).includes("Next")) {
        label = String(label).replace("Next", "Siguiente");
    }
    return label;
}

const filtroForm = ref({
    categoria_id: props.filtros.categoria_id || "",
    solo_mias: props.filtros.solo_mias || false,
});

const offset = computed(
    () => (props.ranking.meta.current_page - 1) * props.ranking.meta.per_page
);

function aplicarFiltros() {
    console.log(filtroForm.value);
    router.get(route("clasificacion"), filtroForm.value, {
        preserveScroll: true,
        preserveState: true,
    });
}

function limpiarFiltros() {
    filtroForm.value = { categoria_id: "", solo_mias: false };
    router.get(
        route("clasificacion"),
        {},
        {
            preserveScroll: true,
            preserveState: true,
        }
    );
}

const disableFilterButtons = computed(
    () =>
        filtroForm.value.categoria_id == "" &&
        filtroForm.value.solo_mias == false
);

console.log(props.ranking);
console.log(props.categorias);

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
        <div class="py-10">
            <div class="max-w-4xl mx-auto px-4 sm:px-8">
                <h1 class="text-2xl font-bold mb-6">Clasificación</h1>
                <!-- Filtros -->
                <form
                    @submit.prevent="aplicarFiltros"
                    class="flex flex-wrap gap-4 mb-6 items-end"
                >
                    <div>
                        <label class="block text-sm font-medium mb-1"
                            >Categoría</label
                        >
                        <select
                            v-model="filtroForm.categoria_id"
                            class="border rounded px-3 py-2"
                        >
                            <option value="">Todas</option>
                            <option
                                v-for="cat in categorias"
                                :key="cat.id"
                                :value="cat.id"
                            >
                                {{ cat.nombre }}
                            </option>
                        </select>
                    </div>

                    <div class="flex items-center self-center gap-2 mt-6">
                        <input
                            type="checkbox"
                            v-model="filtroForm.solo_mias"
                            id="solo_mias"
                        />
                        <label for="solo_mias">Solo mis partidas</label>
                    </div>

                    <button
                        type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 disabled:bg-blue-300"
                        :disabled="disableFilterButtons"
                    >
                        Aplicar
                    </button>
                    <button
                        type="button"
                        @click="limpiarFiltros"
                        class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400 disabled:bg-gray-200 disabled:text-gray-500"
                        :disabled="disableFilterButtons"
                    >
                        Limpiar filtros
                    </button>
                </form>

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
                                    {{ offset + index + 1 }}
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
                        :href="link.url ? link.url : 'null'"
                        :disabled="!link.url"
                        @click="goToPage(link.url)"
                        v-html="translateLabel(link.label)"
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
