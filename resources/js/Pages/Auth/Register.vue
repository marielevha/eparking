<template>
    <div class="flex flex-col items-center justify-center px-6 mx-auto ">
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Sign up
          </h1>
          <form class="space-y-4 md:space-y-6" @submit.prevent="register">
            <div>
              <e-text-input v-model="form.first_name" :error="form.errors.first_name" label="First Name" type="text" autofocus autocapitalize="on" />
            </div>
            <div>
              <e-text-input v-model="form.last_name" :error="form.errors.last_name" label="Last Name" type="text" autofocus autocapitalize="on" />
            </div>
            <div>
              <e-text-input v-model="form.email" :error="form.errors.email" label="Your email" type="email" autofocus autocapitalize="off" />
            </div>
            <div>
              <e-text-input v-model="form.password" :error="form.errors.password" label="Password" type="password" autofocus autocapitalize="off" />
            </div>
            <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign up</button>
            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
              Already have an account? <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login Here</a>
            </p>
          </form>
        </div>
      </div>
    </div>
</template>

<script>
  import { Head } from '@inertiajs/inertia-vue3'
  import Logo from '@/Shared/Logo'
  import ELayout from '@/Shared/ELayout'
  import TextInput from '@/Shared/TextInput'
  import LoadingButton from '@/Shared/LoadingButton'
  import ETextInput from "@/Shared/ETextInput";

  export default {
    layout: ELayout,
    components: {
      ETextInput,
      Head,
      LoadingButton,
      Logo,
      TextInput,
    },
    data() {
      return {
        form: this.$inertia.form({
          first_name: 'Mariel Evha',
          last_name: 'ABIR',
          email: 'johndoe@example.com',
          password: 'password',
          remember: false,
        }),
      }
    },
    methods: {
      register() {
        this.form.post('/register')
      },
    },
  }
</script>
