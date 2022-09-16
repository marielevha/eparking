<template>
  <div :class="$attrs.class">
    <div class="rounded-md p-6 bg-white shadow">
      <div class="mb-2 pb-2">
        <h3 class="font-semibold text-lg text-gray-600">{{ title }}</h3>
        <p class="text-sm text-gray-500">{{ desc }}</p>
      </div>
      <div id="chartdiv" class="w-full" style="height: 240px">
        <slot></slot>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ContainerChart',

  props: {
    title: {
      type: String,
      default: 'Chart Title'
    },
    desc: {
      type: String,
      default: 'Description chart'
    },
  }
}
</script>

<style scoped>

</style>
