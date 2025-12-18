<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import { onMounted, ref } from 'vue'
import Chart from 'chart.js/auto'

const props = defineProps<{
    aportesPorMes: {
        mes: string
        total: number
    }[]
    aportesPorAtivo: {
        ativo: string
        total: number
    }[]
}>()
    console.log(props.aportesPorMes)
const chartMesRef = ref<HTMLCanvasElement | null>(null)
const chartAtivoRef = ref<HTMLCanvasElement | null>(null)

onMounted(() => {
    if (chartMesRef.value && props.aportesPorMes.length) {
        new Chart(chartMesRef.value, {
            type: 'bar',
            data: {
                labels: props.aportesPorMes.map(item =>
                    item.mes.split('-').reverse().join('/')
                ),
                datasets: [
                    {
                        label: 'Total investido',
                        data: props.aportesPorMes.map(item => Number(item.total)),
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        })
    }

    if (chartAtivoRef.value && props.aportesPorAtivo.length) {
        new Chart(chartAtivoRef.value, {
            type: 'bar',
            data: {
                labels: props.aportesPorAtivo.map(item => item.ativo),
                datasets: [
                    {
                        label: 'Total investido',
                        data: props.aportesPorAtivo.map(item => Number(item.total)),
                    },
                ],
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                plugins: {
                    legend: { display: false },
                },
                scales: {
                    x: {
                        beginAtZero: true,
                    },
                },
            },
        })
    }
})
</script>


<template>
    <Head title="Dashboard" />

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
        <div class="bg-white dark:bg-zinc-900 p-4 rounded-xl">
            <h2 class="text-lg font-semibold mb-4">
                Total investido por mês
            </h2>
            <canvas ref="chartMesRef"></canvas>
        </div>

        <div class="bg-white dark:bg-zinc-900 p-4 rounded-xl">
            <h2 class="text-lg font-semibold mb-4">
                Ativos com maior valor alocado
            </h2>
            <canvas ref="chartAtivoRef"></canvas>
        </div>
    </div>
</template>
