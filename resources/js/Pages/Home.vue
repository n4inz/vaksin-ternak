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

        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-16">
            <div class="relative overflow-x-auto">
                <table class="border-2 w-full p-5" border="1">
                    <thead class="font-bold text-center">
                        <tr >
                            <td rowspan="3" class="border-2 border-slate-700">No</td>
                            <td rowspan="3" class="border-2 border-slate-700">Tahun</td>
                            <td colspan="10" class="border-2 border-slate-700">Jenis Vaksin</td>
                            <td rowspan="3" class="border-2 border-slate-700">Keterangan</td>
                        </tr>
                        <tr >
                            <td colspan="2" class="border-2 border-slate-700">Anthrax (Dosis)</td>
                            <td colspan="2" class="border-2 border-slate-700">Brucellosis (Dosis)</td>
                            <td colspan="2" class="border-2 border-slate-700">Rabies (Dosis)</td>
                            <td colspan="2" class="border-2 border-slate-700">Se (Dosis)</td>
                            <td colspan="2" class="border-2 border-slate-700">PMK</td>
                        </tr>
                        <!-- <tr >
                            <td  class="border-2 border-slate-700">APBD II</td>
                            <td class="border-2 border-slate-700">APBD I</td>
                            <td  class="border-2 border-slate-700">APBD II</td>
                            <td class="border-2 border-slate-700">APBD I</td>
                            <td  class="border-2 border-slate-700">APBD II</td>
                            <td class="border-2 border-slate-700">APBD I</td>
                            <td colspan="2" class="border-2 border-slate-700">APBD II</td>
                            <td colspan="2" class="border-2 border-slate-700">APBD I</td>
                    
                        </tr> -->
                    </thead>
                    <tbody>
                        <tr >
                            <td  class="border-2 border-slate-700">1</td>
                            <td class="border-2 border-slate-700">2016</td>
                            <td colspan="2"  class="border-2 border-slate-700">16.000</td>
                            <td colspan="2" class="border-2 border-slate-700">3.000</td>
               
                            <td colspan="2" class="border-2 border-slate-700">4.850</td>

                            <td colspan="2" class="border-2 border-slate-700">6.500</td>
                            <td colspan="2" class="border-2 border-slate-700">-</td>
                            <td colspan="2" class="border-2 border-slate-700"></td>
                        </tr>

                        <tr >
                            <td  class="border-2 border-slate-700">2</td>
                            <td class="border-2 border-slate-700">2017</td>
                            <td colspan="2" class="border-2 border-slate-700">2.000</td>
                            <td colspan="2" class="border-2 border-slate-700">1.000</td>
                            <td colspan="2" class="border-2 border-slate-700">1.500</td>
                            <td colspan="2" class="border-2 border-slate-700">0</td>
                            <td colspan="2" class="border-2 border-slate-700">-</td>
                            <td colspan="2" class="border-2 border-slate-700"></td>
                        </tr>

                        <tr >
                            <td  class="border-2 border-slate-700">3</td>
                            <td class="border-2 border-slate-700">2018</td>
                            <td colspan="2" class="border-2 border-slate-700">5.000</td>
                            <td colspan="2" class="border-2 border-slate-700">300</td>
                            <td colspan="2" class="border-2 border-slate-700">750</td>
                            <td colspan="2" class="border-2 border-slate-700">0</td>
                            <td colspan="2" class="border-2 border-slate-700">-</td>
                            <td colspan="2" class="border-2 border-slate-700"></td>
                        </tr>

                        <tr >
                            <td  class="border-2 border-slate-700">4</td>
                            <td class="border-2 border-slate-700">2019</td>
                            <td colspan="2"  class="border-2 border-slate-700">10.500</td>
                            <td colspan="2" class="border-2 border-slate-700">500</td>
                            <td colspan="2" class="border-2 border-slate-700">700</td>
                            <td colspan="2" class="border-2 border-slate-700">4.000</td>
                            <td colspan="2" class="border-2 border-slate-700">-</td>
                            <td colspan="2" class="border-2 border-slate-700"></td>
                        </tr>

                        <tr >
                            <td  class="border-2 border-slate-700">5</td>
                            <td class="border-2 border-slate-700">2020</td>
                            <td colspan="2" class="border-2 border-slate-700">7.400</td>
                            
                            <td colspan="2" class="border-2 border-slate-700">500</td>
                            <td colspan="2" class="border-2 border-slate-700">1.150</td>
                            <td colspan="2" class="border-2 border-slate-700">3.300</td>
                            <td colspan="2" class="border-2 border-slate-700">-</td>
                            <td colspan="2" class="border-2 border-slate-700"></td>
                        </tr>

                        <tr>
                            <td  class="border-2 border-slate-700">6</td>
                            <td class="border-2 border-slate-700">2021</td>
                            <td colspan="2" class="border-2 border-slate-700">5.500</td>

                            <td colspan="2" class="border-2 border-slate-700">500</td>
                            <td colspan="2"  class="border-2 border-slate-700">600</td>
                            <td colspan="2" class="border-2 border-slate-700">2.150</td>
                            <td colspan="2" class="border-2 border-slate-700">-</td>
                            <td colspan="2" class="border-2 border-slate-700"></td>
                        </tr>

                        <tr >
                            <td  class="border-2 border-slate-700">7</td>
                            <td class="border-2 border-slate-700">2022</td>
                            <td colspan="2"  class="border-2 border-slate-700">4.700</td>
                            <td colspan="2" class="border-2 border-slate-700">500</td>
                            <td  colspan="2" class="border-2 border-slate-700">600</td>

                            <td colspan="2" class="border-2 border-slate-700">4.000</td>
                            <td colspan="2" class="border-2 border-slate-700">11.877</td>
                            <td colspan="2" class="border-2 border-slate-700"></td>
                        </tr>

                        <tr >
                            <td  class="border-2 border-slate-700">8</td>
                            <td class="border-2 border-slate-700">2023</td>
                            <td colspan="2" class="border-2 border-slate-700">800</td>
                            <td colspan="2" class="border-2 border-slate-700">300</td>

                            <td colspan="2" class="border-2 border-slate-700">300</td>
                            <td colspan="2" class="border-2 border-slate-700">-</td>
                            <td colspan="2" class="border-2 border-slate-700">-</td>
                            <td colspan="2" class="border-2 border-slate-700"></td>
                        </tr>
                    </tbody>
                </table>
                <!-- <table border="1" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-b">
                        <tr>
                            <th rowspan="3" scope="col" class="px-6 py-3 text-center ">
                                No
                            </th>
                            <th rowspan="3" scope="col" class="px-6 py-3">
                                Tahun
                            </th>
                            <th colspan="8" scope="col" class="px-6 py-3">
                                Jenis Vaksin
                            </th>
                            <th rowspan="3" scope="col" class="px-6 py-3 border">
                                Categoryaa
                            </th>
                            
                        </tr>
                        <tr>
                            
                            <th colspan="2" scope="col" class="px-6 py-3">
                                ANTHRAX (Dosis)
                            </th>

                            <th colspan="2"  scope="col" class="px-6 py-3">
                                Brucellosis (Dosis)
                            </th>
                            <th colspan="2"  scope="col" class="px-6 py-3">
                                Rabies (Dosis)
                            </th>
                            <th colspan="2"  scope="col" class="px-6 py-3">
                                SE (Dosis)
                            </th>
                            <th colspan="2"  scope="col" class="px-6 py-3">
                               PMK
                            </th>

                        </tr>
                        <tr>

                            <th colspan="2" scope="col" class="px-6 py-3">
                                Category
                            </th>

                        </tr>
                        
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="text-center font-semibold">
                                1
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Apple MacBook Pro 17"
                            </td>
                            <td class="px-6 py-4">
                                Silver
                            </td>
                            <td class="px-6 py-4">
                                Laptop
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                        </tr>

                    </tbody>
                </table> -->
            </div>

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
                labels: [ '2020' ,'2021','2022','2023'],
                datasets: [
                    {
                        label: 'Populasi',
                        backgroundColor: '#06b6d4',
                        data: [12350,8750,21677,1400]
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
