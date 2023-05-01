<template>
  <header class="bg-gray-800 text-gray-100">
    <nav class="flex justify-between items-center py-4 px-6">
      <div class="flex items-center">
        <img src="https://media.licdn.com/dms/image/C4D03AQGfryTMV25U9w/profile-displayphoto-shrink_100_100/0/1603398979048?e=1686787200&v=beta&t=iCLdzwPuzj8TklDxxWVJCi-RmSsuN0fijDjyZNAk2HA" class="w-12 h-12 rounded-full mr-4">
        <h1 class="text-2xl font-bold">Vitor Mariano Pereira</h1>
      </div>
      <ul class="flex space-x-4">
        <Link class="group flex items-center py-3" href="/dashboard">
          <icon name="login" class="mr-2 w-4 h-4" :class="isUrl('') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
          <div :class="isUrl('') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Login</div>
        </Link>
      </ul>
    </nav>
  </header>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon'

export default {
  components: {
    Icon,
    Link,
  },
  methods: {
    isUrl(...urls) {
      let currentUrl = this.$page.url.substr(1)
      if (urls[0] === '') {
        return currentUrl === ''
      }
      return urls.filter((url) => currentUrl.startsWith(url)).length
    },
  },
  name: 'Header',
};
</script>
