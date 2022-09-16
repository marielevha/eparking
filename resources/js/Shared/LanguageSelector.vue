<template>
  <div class="ml-4">
<!--    <inertia-link :href="route('language', [selectable_locale])">-->
    <inertia-link :href="`/language/${selectable_locale}`">
      <icon class="w-5 h-5" :name="selectable_locale" />
    </inertia-link>
  </div>
</template>

<script>
import Icon from '@/Shared/Icon'

export default {
  components: {
    Icon,
  },

  computed: {
    selectable_locale() {
      if(this.$page.locale === 'fr') {
        return 'en';
      }
      return 'fr'
    }
  },
}
</script>
