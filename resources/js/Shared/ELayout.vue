<template>
    <div>
      <ETopBar />
      <div class="container">
        <flash-messages />
        <slot />
      </div>
    </div>
</template>

<script>
  import FlashMessages from '@/Shared/FlashMessages'
  import ETopBar from "@/Shared/ETopBar";
  export default {
    name: "ELayout",
    components: {
      ETopBar,
      FlashMessages
    }
  }
</script>

<style lang="css" scoped>
  .container {
    position: absolute;
    right: 0;
    left: 0;
    top: 100px;
    margin: auto;
  }
  .fw-step-title {
    padding-top: 10px;
  }
</style>
