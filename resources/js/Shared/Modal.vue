<template>
  <transition name="modal-animation">
    <div v-show="show" class="modal">
      <transition name="modal-animation-inner">
        <div v-show="show" class="modal-inner rounded-lg border border-gray-300 shadow-xl">
          <div class="flex flex-row justify-between  bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg">
            <p class="font-semibold text-gray-800 modal-title">{{ title }}</p>
            <vue-feather @click="close" type="x" class="w-6 h-6 text-gray-700"></vue-feather>
          </div>
          <slot />
        </div>
      </transition>
    </div>
  </transition>
</template>

<script>
import TextInput from '@/Shared/TextInput'
export default {
  components: {
    TextInput
  },
  name: 'Modal',
  props: {
    show: Boolean,
    title: String,
  },
  data() {
    return {
      form: this.$inertia.form({
        title: '',
        description: '',
        activated: false,
      }),
    }
  },
  methods: {
    close() {
      this.$emit("close");
    },
  },
}
</script>

<style scoped>
.modal-animation-enter-active, .modal-animation-leave-active {
  transition: opacity 0.3s cubic-bezier(0.52, 0.02, 0.19, 1.02);
}
.modal-animation-enter-from, .modal-animation-leave-to {
  opacity: 0;
}
.modal-animation-inner-enter-active {
  transition: all 0.3s cubic-bezier(0.52, 0.02, 0.19, 1.02) 0.15s;
}
.modal-animation-inner-leave-active {
  transition: all 0.3s cubic-bezier(0.52, 0.02, 0.19, 1.02);
}
.modal-animation-inner-enter-from {
  opacity: 0;
  transform: scale(0.8);
}
.modal-animation-inner-leave-to {
  transform: scale(0.8);
}
.modal {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  width: 100vw;
  position: fixed;
  top: 0;
  left: 0;
  background-color: rgba(255, 255, 255, 0.7);
}
.modal .modal-inner {
  position: relative;
  max-width: 640px;
  width: 80%;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
  background-color: #fff;
  padding: 64px 16px;
}
.modal .modal-inner i {
  position: absolute;
  top: 15px;
  right: 15px;
  font-size: 20px;
  cursor: pointer;
}
.modal-title {
  position: absolute;
  top: 15px;
  left: 15px;
  font-size: 20px;
  cursor: pointer;
}
.modal .modal-inner i:hover {
  color: crimson;
}
.modal .modal-inner button {
  padding: 20px 30px;
  border: none;
  font-size: 16px;
  background-color: crimson;
  color: #fff;
  cursor: pointer;
}

</style>
