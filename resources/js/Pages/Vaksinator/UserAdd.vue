<template>
    <Sidebar @toggleChildClass="toggleChildClass" />
    <div ref="homeContent" class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            
            <h1>Add user</h1>

        </div>
    </div>
</template>

<script>

import Sidebar from '../Layouts/Sidebar.vue';

export default {
  components: {
    Sidebar
  },

  methods: {
    toggleChildClass() {
      this.$refs.homeContent.classList.toggle('sm:ml-64');
    }
  }
  // Logika komponen lain
}


</script>
