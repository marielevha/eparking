<template>
  <label v-if="label" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" :for="id">{{ label }}:</label>
  <input :id="id" ref="input" v-bind="{ ...$attrs, class: null }" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-input" :class="{ error: error }" :type="type" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" :readonly="readOnly"/>
  <div v-if="error" class="form-error">{{ error }}</div>
</template>

<script>
  import { v4 as uuid } from 'uuid'

  export default {
    name: "ETextInput",

    inheritAttrs: false,
    props: {
      id: {
        type: String,
        default() {
          return `text-input-${uuid()}`
        },
      },
      type: {
        type: String,
        default: 'text',
      },
      error: String,
      label: String,
      modelValue: String,
      readOnly: Boolean
    },
    emits: ['update:modelValue'],
    methods: {
      focus() {
        this.$refs.input.focus()
      },
      select() {
        this.$refs.input.select()
      },
      setSelectionRange(start, end) {
        this.$refs.input.setSelectionRange(start, end)
      },
    },
  }
</script>

<style scoped>

</style>
