<template>
  <div class="p-5 bg-white rounded shadow-sm">
    <div class="flex items-center space-x-4">
      <div>
        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-fuchsia-50 text-fuchsia-400">
          <icon :name="icon"/>
        </div>
      </div>
      <div>
        <div class="text-gray-400 py-2">{{ label }}</div>
        <div class="text-2xl font-bold text-gray-900">{{ value }}</div>
      </div>
    </div>
  </div>
</template>

<script>
import Icon from '@/Shared/Icon'
export default {
  name: 'CardStat',
  components: {Icon},
  props: {
    label: {
      type: String,
      default: 'Label',
    },
    value: {
      type: Number,
      default: 0,
    },
    icon: {
      type: String,
      default: '',
    },
  }
}
</script>

<style scoped>

</style>
