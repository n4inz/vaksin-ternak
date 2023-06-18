<template>
    <Sidebar @toggleChildClass="toggleChildClass" />
    <div ref="homeContent" class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <Bar
                id="my-chart-id"
                :options="chartOptions"
                :data="chartData"
            />


        </div>
    </div>
</template>

<script>
import Sidebar from './Layouts/Sidebar.vue';
import { Bar,Pie } from 'vue-chartjs';
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'
ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)
export default {
  components: {
    Sidebar,
     Bar,
     Pie
  },

     data() {
        return {
            chartData: {
                labels: [ '2018', '2019', '2020' ,'2021','2022','2023'],
                datasets: [
                    {
                        label: 'Populasi',
                        backgroundColor: '#06b6d4',
                        data: [100,200,500,200,700,300]
                    }
                ]
            },
            chartOptions: {
                responsive: true
            },

            chartData1: {
                labels: [ '2018', '2019', '2020' ,'2021','2022','2023'],
                datasets: [
                    {
                        label: 'Populasi',
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4ade80' , '#2dd4bf' ,'#fb7185'],

                        data: [100,200,500,200,700,300]
                    }
                ]
            },
            chartOptions1: {
                responsive: true
            },
           
        }
    },

  methods: {
    toggleChildClass() {
      this.$refs.homeContent.classList.toggle('sm:ml-64');
    }
  }
  // Logika komponen lain
}


</script>
