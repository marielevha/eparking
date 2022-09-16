<template>
  <div :class="$attrs.class">
    <label v-if="label" class="form-label" :for="id">{{ label }}:</label>
    <textarea
      :id="id"
      ref="input"
      v-bind="{ ...$attrs, class: null }"
      :class="{ error: error }" :type="type"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      :readonly="readOnly"
      class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none form-input"
      :rows="rows">
    </textarea>
    <div v-if="error" class="form-error">{{ error }}</div>
  </div>
</template>

<script>
import { v4 as uuid } from 'uuid'

export default {
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
    rows: {
      type: String,
      default: '2',
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
