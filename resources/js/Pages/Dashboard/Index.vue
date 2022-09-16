<template>
  <div>
    <Head title="Dashboard" />
    <h1 class="mb-8 text-3xl font-bold">Dashboard</h1>
    <div class="container max-w-6xl px-5 mx-auto my-10">
      <div class="grid gap-7 sm:grid-cols-3 lg:grid-cols-5">
        <CardStat
          :label="series['label']"
          :value="series['countSeries']"
          icon="total-sales"
          v-if="isPermit('series.read', permissions) && series['countSeries'] != null"/>
        <CardStat
          :label="subjects['label']"
          :value="subjects['countSubjects']"
          icon="net-revenue"
          v-if="isPermit('subject.read', permissions) && subjects['countSubjects'] != null"/>
        <CardStat
          :label="users['label']"
          :value="users['countUsers']"
          icon="customers"
          v-if="isPermit('user.read', permissions) && users['countUsers'] != null"/>
        <CardStat
          :label="students['label']"
          :value="students['countStudents']"
          icon="customers"
          v-if="isPermit('user.read', permissions) && students['countStudents'] != null"/>
        <CardStat
          :label="authors['label']"
          :value="authors['countAuthors']"
          icon="customers"
          v-if="isPermit('user.read', permissions) && authors['countAuthors'] != null"/>
        <CardStat
          :label="reviewers['label']"
          :value="reviewers['countReviewers']"
          icon="customers"
          v-if="isPermit('user.read', permissions) && reviewers['countReviewers'] != null"/>
      </div>
    </div>

    <!-- component -->
    <div class="block">
      <div class="container px-4 py-4 mx-auto">
        <h3 class="block text-xl text-gray-700 font-semibold mb-3"></h3>
        <div class="flex">
          <ContainerChart class="w-1/2">
            <BarChart :chart-data="registrationStudents()"/>
          </ContainerChart>
          <ContainerChart class="w-1/2 ml-4">
            <PieChart :chart-data="test()"/>
          </ContainerChart>
          <div class="w-1/2 ml-4">
            <div class="rounded-md p-6 bg-white shadow">
              <div class="mb-2 pb-2">
                <h3 class="font-semibold text-lg text-gray-600">Bar Chart</h3>
                <p class="text-sm text-gray-500">Profit Share between customers</p>
              </div>
              <div id="chartdiv2" class="w-full" style="height: 240px">
                <BarChart />
              </div>
            </div>
          </div>
          <LineChart />
        </div>
      </div>
    </div>


  </div>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import Layout from '@/Shared/Layout'
import BarChart from '@/Shared/BarChart'
import CardStat from '@/Shared/CardStat'
import ContainerChart from '@/Shared/ContainerChart'
import PieChart from '@/Shared/PieChart'
import LineChart from '@/Shared/LineChart'

export default {
  components: {
    LineChart,
    PieChart,
    ContainerChart,
    CardStat,
    Head,
    BarChart,
  },
  layout: Layout,
  props: {
    series: Array,
    subjects: Array,
    users: Array,
    students: Array,
    authors: Array,
    reviewers: Array,
  },

  computed: {
    user() {
      return this.$page.props.locale
    },
    permissions() {
      return this.$page.props.permissions
    }
  },

  methods: {
    registrationStudents: function () {
      return {
        labels: [
          'January',
          'February',
          'March',
          'April',
          'May',
          'June',
          'July',
          'August',
          'September',
          'October',
          'November',
          'December'
        ],
          datasets: [
          {
            label: 'Data ONE',
            backgroundColor: '#f87979',
            data: [40, 20, 12, 39, 10, 40, 39, 80, 40, 20, 12, 11]
          }
        ]
      }
    },
    test: function () {
      return {
        labels: ['VueJs', 'EmberJs', 'ReactJs', 'AngularJs'],
          datasets: [
          {
            backgroundColor: ['#41B883', '#E46651', '#00D8FF', '#DD1B16'],
            data: [40, 20, 80, 10]
          }
        ]
      };
    }
  }
}
</script>
