<template>
  <div>
    <div class="mb-4" v-if="isPermit('document.read', permissions)">
      <Link class="group flex items-center py-3" href="/">
        <icon name="dashboard" class="mr-2 w-4 h-4" :class="isUrl('') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">{{ $t('main_menu.dashboard') }}</div>
      </Link>
    </div>
<!--    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/organizations">
        <icon name="office" class="mr-2 w-4 h-4" :class="isUrl('organizations') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('organizations') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Organizations</div>
      </Link>
    </div>-->
<!--    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/contacts">
        <icon name="users" class="mr-2 w-4 h-4" :class="isUrl('contacts') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('contacts') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Contacts</div>
      </Link>
    </div>-->
<!--    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/reports">
        <icon name="printer" class="mr-2 w-4 h-4" :class="isUrl('reports') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('reports') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Reports</div>
      </Link>
    </div>-->
    <div class="mb-4" v-if="isPermit('series.read', permissions)">
      <Link class="group flex items-center py-3" href="/series">
        <icon name="series" class="mr-2 w-4 h-4" :class="isUrl('series') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('series') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">{{ $t('main_menu.series') }}</div>
      </Link>
    </div>
    <div class="mb-4" v-if="isPermit('subject.read', permissions)">
      <Link class="group flex items-center py-3" href="/subjects">
        <icon name="subjects" class="mr-2 w-4 h-4" :class="isUrl('subjects') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('subjects') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">{{ $t('main_menu.subjects') }}</div>
      </Link>
    </div>
<!--    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/levels">
        <icon name="levels" class="mr-2 w-4 h-4" :class="isUrl('levels') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('levels') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">{{ $t('main_menu.levels') }}</div>
      </Link>
    </div>-->
    <div class="mb-4" v-if="isPermit('filemanager', permissions)">
      <Link class="group flex items-center py-3" href="/filemanager">
        <icon name="documents" class="mr-2 w-4 h-4" :class="isUrl('filemanager') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('filemanager') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">{{ $t('main_menu.file_manager') }}</div>
      </Link>
    </div>
<!--    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/documents">
        <icon name="test" class="mr-2 w-4 h-4" :class="isUrl('test') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('documents') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Tests</div>
      </Link>
    </div>-->
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon'

export default {
  components: {
    Icon,
    Link,
  },
  created() {},
  computed: {
    permissions() {
      return this.$page.props.permissions
    }
  },
  methods: {
    isUrl(...urls) {
      let currentUrl = this.$page.url.substr(1)
      if (urls[0] === '') {
        return currentUrl === ''
      }
      return urls.filter((url) => currentUrl.startsWith(url)).length
    },
    /*isPermit: function (permission) {
      for (let i = 0; i < this.permissions.length; i++) {
        if (this.permissions[i].name === permission) {
          return true;
        }
      }
      return false;
    }*/
  },
}
</script>
